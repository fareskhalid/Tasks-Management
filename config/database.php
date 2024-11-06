<?php
    return [
        'driver'    => env('DATABASE_DRIVER', 'mysql'),
        'host'      => env('DATABASE_HOST', 'localhost'),
        'charset'   => env('DATABASE_CHARSET', 'UTF8'),
        'db_name'   => env('DATABASE_NAME', 'my_db'),
        'user'      => env('DATABASE_USERNAME', 'root'),
        'password'  => env('DATABASE_PASSWORD', '')
    ];