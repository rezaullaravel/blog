<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcceeccbe87c7ea9ca3b35b19f1e7a285
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcceeccbe87c7ea9ca3b35b19f1e7a285::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcceeccbe87c7ea9ca3b35b19f1e7a285::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
