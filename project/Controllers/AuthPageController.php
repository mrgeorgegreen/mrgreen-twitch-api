<?php

namespace App\Controllers;

class AuthPageController extends BaseController
{
    public function index()
    {
        $this->view('authPage', [
            'href' => 'https://id.twitch.tv/oauth2/authorize' .
                '?client_id=' . conf('twitch')['client_id'] .
                '&redirect_uri=' . conf('twitch')['redirect_uri'] .
                '&response_type=' . conf('twitch')['response_type'] .
                '&scope=' . conf('twitch')['scope'] .
                '&token_type=' . conf('twitch')['token_type']
        ]);
    }
}