<?php

namespace App\Controllers;

use App\Core\Request;

class HomePageController extends BaseController
{
    public function index(Request $request): void
    {
        $this->view('homePage', ['clientId' => conf('twitch')['client_id']]);
    }
}