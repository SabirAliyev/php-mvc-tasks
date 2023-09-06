<?php

namespace App\App\Database;
use \PDO;
use PDOException;

// A class responsible for database connections.
class Connection
{
    public static function make(array $config)
    {
        try {
            return new PDO(
                'pgsql:host=localhost;dbname=tasks_mvc_db',
                'postgres',
                'postgres',
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    PDO::ATTR_PERSISTENT         => true
                ]
            );
        }
        catch (PDOException $e) {
            error_log("Database connection error: " . $e->getMessage(), 3, "logs/app.log");
            dd($e->getMessage());
        }
    }
}