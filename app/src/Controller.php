<?php

namespace SON;

class Controller
{
    // renderiza html
    public function render(array $data = [], string $view = null)
    {
        // Trnasforma arrays
        // key => value
        // em variaveis
        // $key = value
        extract($data);

        require __DIR__ . '/templates/' . $view . '.tpl.php';
    }
}
