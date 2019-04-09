<?php

function conf($arg)
{
    $config = include(__DIR__ . '/../conf.php');
    return $config[$arg] ?? null;
}