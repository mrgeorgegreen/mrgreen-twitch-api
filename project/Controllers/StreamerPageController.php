<?php


namespace App\Controllers;


class StreamerPageController extends BaseController
{
    public function index(array $parameters)
    {
        $this->view('streamerPage', $parameters);
    }
}