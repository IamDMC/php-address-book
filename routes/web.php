<?php

use Iamdmc\PhpAddressBook\Controllers\ContactController;

/** @var \Iamdmc\PhpAddressBook\Core\Router $router */


$router->get('/', [ContactController::class, 'index']);
$router->get('/contacts/create', [ContactController::class, 'create']);
$router->post('/contacts', [ContactController::class, 'store']);