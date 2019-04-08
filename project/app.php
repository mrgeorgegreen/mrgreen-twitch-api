<?php

use App\Controllers\AuthPageController;
use App\Controllers\HomePageController;
use App\Controllers\StreamerPageController;
use App\Models\Database;

function conf($arg)
{
    $config = include(__DIR__ . '/../conf.php');
    return $config[$arg] ?? null;
}

$res = ( new Database )->get_connection(); //->query('select 1+1 as s' );
$g = $res->query('CREATE TABLE IF NOT EXISTS tasks (task_id INT AUTO_INCREMENT) ENGINE=INNODB;');

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