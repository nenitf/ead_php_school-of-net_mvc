<?php
// php app/bootstrap.php

require __DIR__ . '/vendor/autoload.php';

$controller = new App\Controllers\UserController;

echo $controller->handler();
// SON\Controller
