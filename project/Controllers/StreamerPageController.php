<?php

namespace App\Controllers;

use App\Core\Request;

class StreamerPageController extends BaseController
{
    public function index(Request $request): void
    {
        $parameters['streamer'] = $request->name;
        $parameters['streamer_id'] = $request->id;
        $parameters['clientId'] = conf('twitch')['client_id'];

        $this->view('streamerPage', $parameters);
    }
}