<?php

namespace App\Controllers;

class BaseController
{
    public function view($view, $data = array())
    {

        require_once __DIR__ . '/../Views/' . $view . '.php';
    }
}