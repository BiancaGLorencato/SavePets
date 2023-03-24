<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2ff5efef607595241c8891ebe3caa432
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SavePets\\Web\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SavePets\\Web\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2ff5efef607595241c8891ebe3caa432::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2ff5efef607595241c8891ebe3caa432::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2ff5efef607595241c8891ebe3caa432::$classMap;

        }, null, ClassLoader::class);
    }
}
