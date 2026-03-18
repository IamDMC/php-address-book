<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Core/helpers.php';

define('BASE_PATH', dirname(__DIR__));

use Iamdmc\PhpAddressBook\Core\Router;

$router = new Router();

require BASE_PATH . '/routes/web.php';

$router->dispatch();