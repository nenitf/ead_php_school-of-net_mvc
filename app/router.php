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

return $router;
