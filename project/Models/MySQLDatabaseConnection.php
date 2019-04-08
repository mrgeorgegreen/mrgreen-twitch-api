<?php
/**
 * Created by PhpStorm.
 * User: mrgreen
 * Date: 08/04/19
 * Time: 8:07 PM
 */

namespace App\Models;

final class MySQLDatabaseConnection implements DatabaseConnection
{
    private $connection;

    public function __construct()
    {
        $this->connection = new \mysqli('db','twitch','twitch','twitch');
    }

    public function query($query)
    {
        $res = $this->connection->query($query);
        return $res->fetch_assoc();
    }
}