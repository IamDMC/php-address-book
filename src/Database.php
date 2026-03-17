<?php

namespace Iamdmc\PhpAddressBook;

use PDO;
class Database
{
    public static function connect()
    {
        $config = require __DIR__ . '/../config/database.php';

        $dataSource = "mysql:host={$config['host']};dbname={$config['database']};charset=utf8mb4";

        return new PDO(
            $dataSource,
            $config['username'],
            $config['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
}