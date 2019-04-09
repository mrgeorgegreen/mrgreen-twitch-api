<?php

require_once 'helpers.php';
require_once 'database.php';

use App\Core\Routing;
use App\Core\Rout;
use App\Core\Request;

$routing = new Routing();
$routing->setRout(new Rout('GET', '/', "App\Controllers\AuthPageController", "index"));
$routing->setRout(new Rout('GET', '/twitch', "App\Controllers\HomePageController", "index"));
$routing->setRout(new Rout('GET', '/streamer', "App\Controllers\StreamerPageController", "index"));
$routing->setRout(new Rout('GET', '/notification', "App\ApiControllers\NotificationApiControllers", "acceptSubscribes"));
$routing->setRout(new Rout('POST', '/notification', "App\ApiControllers\NotificationApiControllers", "addNotification"));
$routing->setRout(new Rout('GET', '/get-notification', "App\ApiControllers\GetNotificationApiControllers", "get"));
//$routing->setRout(new Rout('GET', '/get-log', "App\ApiControllers\GetLogApiControllers", "get"));

if (!$routing->execute(new Request())) {
    header('Location: /');
}
