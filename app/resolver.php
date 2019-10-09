<?php

$resolver = new SON\Resolver;

// Add a collection a chave 'PDO' (type PDO)
// com os valores padrão caso seja chamada
$resolver['PDO'] = function ($r) {
    return new PDO('mysql:host=localhost;dbname=curso_php_mvc', 'root', null, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
};

return $resolver;
