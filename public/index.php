<?php

declare(strict_types=1);

// error_reporting(0); // Uncomment in production

session_start();

use 
    Dotenv\Dotenv,
    TaskManagementSystem\Core\Database,
    TaskManagementSystem\Core\Router;

const BASE_DIR = __DIR__ . '/../';

require BASE_DIR . '/vendor/autoload.php';
require BASE_DIR . '/src/Core/Helpers.php';

// use dotenv lib
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$router = new Router();
$db = Database::getInstance();

require BASE_DIR . '/src/routes/web.php';

$router->resolve();
