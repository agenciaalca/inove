<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0f35dadfacfc497184b996b6a281c21a
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Luthier\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Luthier\\' => 
        array (
            0 => __DIR__ . '/..' . '/luthier/luthier/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'o' => 
        array (
            'org\\bovigo\\vfs' => 
            array (
                0 => __DIR__ . '/..' . '/mikey179/vfsStream/src/main/php',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0f35dadfacfc497184b996b6a281c21a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0f35dadfacfc497184b996b6a281c21a::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit0f35dadfacfc497184b996b6a281c21a::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}