<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita0fef9b4c9ff93ebbdd9565204f848ac
{
    public static $prefixLengthsPsr4 = array (
        'o' => 
        array (
            'omh\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'omh\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita0fef9b4c9ff93ebbdd9565204f848ac::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita0fef9b4c9ff93ebbdd9565204f848ac::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita0fef9b4c9ff93ebbdd9565204f848ac::$classMap;

        }, null, ClassLoader::class);
    }
}
