<?php

namespace App\Models;

final class Database
{

    public function get_connection(): DatabaseConnection
    {
        static $connection = null;

        if (null === $connection) {
            $connection = new MySQLDatabaseConnection();
        }

        return $connection;
    }
}