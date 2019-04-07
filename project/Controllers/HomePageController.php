<?php


namespace App\Controllers;


class HomePageController extends BaseController
{
    public function index()
    {
        $this->view('homePage', ['clientId' => conf('twitch')['client_id']]);
    }
}