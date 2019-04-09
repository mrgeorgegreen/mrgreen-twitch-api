<?php

use App\Models\Notifications;
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();
$capsule->addConnection([
    'driver' => 'sqlite',
    'prefix'   => '',
    'database' => conf('sqlite')
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();