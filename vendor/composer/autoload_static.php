<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite70ef316a399d48e5805fd00aae36c95
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite70ef316a399d48e5805fd00aae36c95::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite70ef316a399d48e5805fd00aae36c95::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite70ef316a399d48e5805fd00aae36c95::$classMap;

        }, null, ClassLoader::class);
    }
}
