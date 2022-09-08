<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd7e09252666bec23a43efda5e10677da
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd7e09252666bec23a43efda5e10677da::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd7e09252666bec23a43efda5e10677da::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd7e09252666bec23a43efda5e10677da::$classMap;

        }, null, ClassLoader::class);
    }
}