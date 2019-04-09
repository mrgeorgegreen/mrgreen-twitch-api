<?php

namespace App\Controllers;

class StreamerPageController extends BaseController
{
    public function index(array $parameters)
    {
        $parameters['clientId'] = conf('twitch')['client_id'];
        $this->view('streamerPage', $parameters);
    }
}