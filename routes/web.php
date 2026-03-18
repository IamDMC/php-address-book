<?php

use Iamdmc\PhpAddressBook\Controllers\ContactController;

/** @var \Iamdmc\PhpAddressBook\Core\Router $router */


$router->get('/', [ContactController::class, 'index']);
$router->get('/contacts/create', [ContactController::class, 'create']);
$router->post('/contacts', [ContactController::class, 'store']);
$router->get('/contacts/search', [ContactController::class, 'search']);

$router->get('/contacts/edit', [ContactController::class, 'edit']);
$router->post('/contacts/update', [ContactController::class, 'update']);
$router->post('/contacts/delete', [ContactController::class, 'delete']);