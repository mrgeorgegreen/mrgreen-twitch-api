<?php

use App\Controllers\AuthPageController;
use App\Controllers\HomePageController;
use App\Controllers\StreamerPageController;
use App\Models\NotificationsModel;
use App\Core\Routing;
use App\Core\Rout;
use App\Core\Request;

require_once 'helpers.php';
require_once 'database.php';

$routing = new Routing();
$routing->setRout(new Rout('GET', '/', "App\Controllers\AuthPageController", "index"));
$routing->setRout(new Rout('GET', '/twitch', "App\Controllers\HomePageController", "index"));
$routing->setRout(new Rout('GET', '/streamer', "App\Controllers\StreamerPageController", "index"));
$routing->setRout(new Rout('GET', '/notification', "App\ApiControllers\NotificationApiControllers", "acceptSubscribes"));
$routing->setRout(new Rout('POST', '/notification', "App\ApiControllers\NotificationApiControllers", "addNotification"));
$routing->setRout(new Rout('GET', '/get-notification', "App\ApiControllers\GetNotificationApiControllers", "get"));

if (!$routing->execute(new Request())) {
    header('Location: /');
}
