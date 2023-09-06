<?php

namespace App\App;

// A Dependency-Injection Container
class App
{
    protected static array $registry = [];

    public static function bind(string $key, $val): void
    {
        static::$registry[$key] = $val;
    }

    public static function get(string $key)
    {
        return static::$registry[$key];
    }
}