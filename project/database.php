<?php

use App\Models\Notifications;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([
    'driver' => 'sqlite',
    'prefix'   => '',
    'database' => conf('sqlite'), //'/app/db/sqlite/database.sqlite'
//    'database' => '/var/www/html/db/sqlite/database.sqlite'
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();