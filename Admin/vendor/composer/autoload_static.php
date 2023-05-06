<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1ce5418c1bb5fee809e8263733db8e4b
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit1ce5418c1bb5fee809e8263733db8e4b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1ce5418c1bb5fee809e8263733db8e4b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1ce5418c1bb5fee809e8263733db8e4b::$classMap;

        }, null, ClassLoader::class);
    }
}
