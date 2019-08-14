<?php

$router = new SON\Router;

$router['/'] = [
  'controller' => App\Controllers\UserController::class,
  'action' => 'Index'
];

return $router;
