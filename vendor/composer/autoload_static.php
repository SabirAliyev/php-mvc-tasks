<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitefcfeeb176d1c25aca7adf289e085685
{
    public static $classMap = array (
        'App\\App\\App' => __DIR__ . '/../..' . '/app/App.php',
        'App\\App\\Database\\Connection' => __DIR__ . '/../..' . '/app/database/Connection.php',
        'App\\App\\Database\\QueryBuilder' => __DIR__ . '/../..' . '/app/database/QueryBuilder.php',
        'App\\App\\Request' => __DIR__ . '/../..' . '/app/Request.php',
        'App\\App\\Router' => __DIR__ . '/../..' . '/app/Router.php',
        'App\\Controllers\\PageController' => __DIR__ . '/../..' . '/controllers/PageController.php',
        'App\\Controllers\\TaskController' => __DIR__ . '/../..' . '/controllers/TaskController.php',
        'App\\Models\\Task' => __DIR__ . '/../..' . '/models/Task.php',
        'ComposerAutoloaderInitefcfeeb176d1c25aca7adf289e085685' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInitefcfeeb176d1c25aca7adf289e085685' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitefcfeeb176d1c25aca7adf289e085685::$classMap;

        }, null, ClassLoader::class);
    }
}