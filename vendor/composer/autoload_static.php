<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc6b0ef8608799f3c0c6164310c9bda1e
{
    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Siteracker' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInitc6b0ef8608799f3c0c6164310c9bda1e::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
