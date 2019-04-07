<?php

use App\Controllers\AuthPageController;
use App\Controllers\HomePageController;
use App\Controllers\StreamerPageController;

function conf($arg)
{
    $config = include(__DIR__ . '/../conf.php');
    return $config[$arg] ?? null;
}


if (isset($_GET['twitch']) && $_GET['twitch']) {
    $main = new HomePageController();
    $main->index();

} elseif ($_COOKIE["tag"] && isset($_GET['streamer'])) {
    parse_str(str_replace('$','',$_COOKIE["tag"]), $params);
    if ($params['access_token']){
        $params['streamer'] = $_GET['streamer'];
        $params['streamer_id'] = $_GET['streamer_id'];
        $streamer = new StreamerPageController();
        $streamer->index($params);
    }

} else {
    $auth = new AuthPageController();
    $auth->index();
}