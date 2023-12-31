<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbcf3338bc3bb23b3d0e440b51b7f1ea0
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitbcf3338bc3bb23b3d0e440b51b7f1ea0', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbcf3338bc3bb23b3d0e440b51b7f1ea0', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbcf3338bc3bb23b3d0e440b51b7f1ea0::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
