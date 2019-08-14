<?php

namespace App\Controllers;

use SON\Controller;

class UserController extends Controller
{
  public function index()
  {
    return "Página inicial de usuários";
  }

  public function create()
  {
    return "Página de cadastro";
  }
}
