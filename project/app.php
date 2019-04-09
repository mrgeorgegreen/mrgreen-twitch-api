<?php

use App\Controllers\AuthPageController;
use App\Controllers\HomePageController;
use App\Controllers\StreamerPageController;
use App\Models\NotificationsModel;

function conf($arg)
{
    $config = include(__DIR__ . '/../conf.php');
    return $config[$arg] ?? null;
}

$a = NotificationsModel::where('user_id', '=', '1')->get();

if ($_SERVER['REDIRECT_URL'] == '/notification' && isset($_GET['hub_challenge']) && $_GET['hub_challenge']) {
    echo $_GET['hub_challenge'];
    die();
//    $notification = NotificationsModel::create();
//    $notification->user_id =
//    $notification->save();
}

if ($_SERVER['REDIRECT_URL'] == '/notification' && file_get_contents('php://input')) {
    $data = json_decode(file_get_contents('php://input'));
    foreach ($data->data as $notification) {
        $notification = NotificationsModel::create([
            'user_id' => $notification->user_id,
            'started_at' => $notification->started_at,
            'data' => json_encode($notification)
        ]);
//        $notification->save();
    }
//    $notification = NotificationsModel::create();
//    $notification->user_id =
}


if (isset($_GET['twitch']) && $_GET['twitch']) {
    $main = new HomePageController();
    $main->index();

} elseif ($_COOKIE["tag"] && isset($_GET['streamer'])) {
    parse_str(str_replace('$', '', $_COOKIE["tag"]), $params);
    if ($params['access_token']) {
        $params['streamer'] = $_GET['streamer'];
        $params['streamer_id'] = $_GET['streamer_id'];
        $streamer = new StreamerPageController();
        $streamer->index($params);
    }

} else {
    $auth = new AuthPageController();
    $auth->index();
}