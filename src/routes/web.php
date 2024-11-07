<?php

use TaskManagementSystem\Controllers\HomeController;
use TaskManagementSystem\Controllers\TaskController;
use TaskManagementSystem\Controllers\UserController;

$router->get('/', HomeController::class, 'index');

$router->get('/task', TaskController::class, 'index');
$router->post('/task', TaskController::class, 'create');
$router->get('/task/edit', TaskController::class, 'edit');
$router->post('/task/edit', TaskController::class, 'update');
$router->get('/task/delete', TaskController::class, 'delete');

$router->get('/login', UserController::class, 'index');
$router->post('/login', UserController::class, 'login');

$router->get('/register', UserController::class, 'register');
$router->post('/register', UserController::class, 'create');

$router->get('/logout', UserController::class, 'logout');
