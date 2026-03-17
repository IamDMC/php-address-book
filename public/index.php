<?php

require __DIR__ . '/../vendor/autoload.php';

use Iamdmc\PhpAddressBook\Database;

try {

    $db = Database::connect();

    echo "Database connection successful";

} catch (PDOException $e) {

    echo "Database connection failed: " . $e->getMessage();

}