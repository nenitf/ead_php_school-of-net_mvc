<?php

$router = new SON\Router;

$router['/'] = [
    'class' => App\Controllers\UserController::class,
    'action' => 'index'
];

$router['/registro'] = [
    'class' => App\Controllers\UserController::class,
    'action' => 'create'
];

$router['/products'] = [
    'class' => App\Controllers\ProductsController::class,
    'action' => 'index'
];


return $router;

