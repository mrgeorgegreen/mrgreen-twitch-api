<?php

function conf($arg)
{
    $config = include(__DIR__ . '/../conf.php');
    return $config[$arg] ?? null;
}

function logger(string $tag, string $description)
{
    App\Models\LoggerModel::create([
        'tag' => $tag,
        'description' => $description
    ]);
}