<?php

const ERROR_LOG_PATH = '/home/sa/php-projects/php-mvc-tasks/app/log/error.log';

return [
    'database' => [
        'dbname' => 'tasks_mvc_db',
        'username' => 'postgres',
        'password' => 'postgres',
        'driver' => 'pgsql',
        'host' => 'localhost',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ],
    ],
    'DEBUG' => true
];