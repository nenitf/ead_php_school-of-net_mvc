<?php

namespace App\Controllers;

use SON\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = $this->model->get();
        $this->render($users);
    }

    public function create()
    {
        return "Página de cadastro";
    }
}
