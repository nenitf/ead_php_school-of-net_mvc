# [ead-son-php-mvc](https://www.schoolofnet.com/curso/php/linguagem-php/php-com-mvc-rev2)

## Comandos docker
* Criar/Iniciar containers ``sudo docker-compose up ``
    * Caso o container nunca tenha sido criado, irá ser executado o Dockerfile
    * Precisa estar na pasta do arquivo ``docker-compose.yml`` para executar o comando
    * Inicia servidor em ``localhost:8056`` observando a pasta app
* Ver nomes de containes ativos `` sudo docker ps ``
* Entrar no bash/terminal do container ``sudo docker exec -it <NAME> bash``
* Encerrar todos containers ``sudo docker-compose down``
    * Precisa estar na pasta do arquivo ``docker-compose.yml`` para executar o comando

## OBS
Esse repo faz parte do Plano de estudos [PHP Intermediário](https://www.schoolofnet.com/plano-de-estudo-php-developer-intermediario/) da SON
