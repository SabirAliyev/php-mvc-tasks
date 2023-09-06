<?php

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