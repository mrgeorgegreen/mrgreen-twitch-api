<?php

use App\Controllers\AuthPageController;
use App\Controllers\HomePageController;
use App\Controllers\StreamerPageController;
use App\Models\NotificationsModel;

if ($_SERVER['REDIRECT_URL'] == '/notification' && isset($_GET['hub_challenge']) && $_GET['hub_challenge']) {

    header("Status: 200");
    echo $_GET['hub_challenge'];
    die();
}

if ($_SERVER['REDIRECT_URL'] == '/notification' && file_get_contents('php://input')) {
    try {
        $data = json_decode(file_get_contents('php://input'));
        foreach ($data->data as $notification) {
            $notification = NotificationsModel::create([
                'user_id' => $notification->user_id,
                'started_at' => $notification->started_at,
                'data' => json_encode($notification)
            ]);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    header("Status: 200");
    echo "OK";
    die();
}

if ($_SERVER['REDIRECT_URL'] == '/get-notification') {
    try {

        $dbh = new PDO('sqlite:/tmp/foo.db'); // success
        echo $dbh->query('DELETE FROM "notifications" WHERE "user_id" = "1"');

//            NotificationsModel::where('user_id', '=', '1')->first()->destroy();
//        echo (NotificationsModel::all())->toJson();
    } catch (Exception $e) {
        echo $e->getMessage();
    }

    header("Status: 200");
    echo "OK";
    die();
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