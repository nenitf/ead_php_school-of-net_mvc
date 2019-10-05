<?php

namespace App\Controllers;

use SON\Controller;

class UserController extends Controller
{
    public function index()
    {
        $this->render(["nome" => "Erik"], "users/index");
    }

    public function create()
    {
        return "Página de cadastro";
    }
}
