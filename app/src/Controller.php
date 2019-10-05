<?php

namespace SON;

class Controller
{
    public function render(array $data = [], string $view = null)
    {
        // Caso não seja passado qual view
        // será escolhido o arquivo de mesmo nome da função que chamou render()
        // do diretório da controller
        // e.g. UserController->index() => app/src/templates/user/index.tpl.php
        if (!$view) {
            $view = $this->controllerName() . '/' . debug_backtrace()[1]['function'];
        }
        extract($data);
        require __DIR__ . '/templates/' . $view . '.tpl.php';
    }

    private function controllerName()
    {
        $class = get_class($this); // App\Controllers\UsersController
        $class = explode('\\', $class); // [ "App", "Controllers", "UsersController" ]
        $class = array_pop($class); // UsersController
        $class = preg_replace('/Controller$/', '', $class); // Users
        return strtolower($class); // users
    }
}
