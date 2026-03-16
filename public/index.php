<?php

require __DIR__ . '/../vendor/autoload.php';

use Iamdmc\PhpAddressBook\Database;

$db = new Database();
// Test starte: php -S localhost:8000 -t public
echo $db->test();