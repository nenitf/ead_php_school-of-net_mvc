<?php

namespace SON;

class Resolver implements \ArrayAccess
{
    use Collection;

    public function handler(string $class, string $method = null)
    {
        // Pega classe que será testada
        $ref = new \ReflectionClass($class);

        // Cria instancia da classe
        $instance = $this->getInstance($ref);

        // Caso não seja passado um método para executar
        // após instanciar a classe, somente a inistância é retornada
        if (!$method) {
            return $instance;
        }

        // Guarda o qual método da classe será resolvido
        $ref_method = new \ReflectionMethod($instance, $method);
        // Chama o método
        $parameters = $this->methodResolver($ref, $ref_method);

        return call_user_func_array([$instance, $method], $parameters);
        
    }

    private function getInstance($ref)
    {
        // Testa se a classe possui construtos
        $constructor = $ref->getConstructor();
        if (!$constructor) {
            // Caso não tenha, retorna uma instância
            return $ref->newInstance();
        }
        
        // Pesquisa e armazena o retorno dos parâmetros
        // necessários do construtor
        $parameters = $this->methodResolver($ref, $constructor);
        // Instancia classe com os parâmetros necessários
        return $ref->newInstanceArgs($parameters);
    }

    // Retorna os parâmetros necessários de um método
    private function methodResolver($ref, $method)
    {
        $parameters = [];

        foreach ($method->getParameters() as $param) {

            if ($param->getType() !== null and $this->offsetExists((string)$param->getType())) {
                $parameters[] = $this->offsetGet((string)$param->getType());
                continue;
            }

            // Caso o parâmetro seja uma classe,
            // a mesma deve ser instânciada
            if ($param->getClass()) {
                // Recursão
                $parameters[] = $this->handler($param->getClass()->getName());
                continue;
            }

            // Testa se o parâmetro é opcional - funcName($param = "aaaa") -,
            // se sim pega o valor default para passar futuramente 
            // quando for chamar o método
            if ($param->isOptional()) {
                $parameters[] = $param->getDefaultValue();
                continue;
            }
        }

        return $parameters;
    }
}

