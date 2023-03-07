<?php

$vendorDir = dirname(__FILE__);

foreach ([
    'Psr\\Container\\' => matching_path($vendorDir . '/psr/container/src'),
    'PhpDocReader\\' => matching_path($vendorDir . '/php-di/phpdoc-reader/src/PhpDocReader'),
    'Opis\\Closure\\' => matching_path($vendorDir . '/opis/closure/src'),
    'Invoker\\' => matching_path($vendorDir . '/php-di/invoker/src'),
    'DI\\' => matching_path($vendorDir . '/php-di/php-di/src'),
    ] as $namespace => $directory)
{
    add_namespace($namespace, $directory);
}

foreach([] as $file)
{
    require_once $file;
}

unset($vendorDir, $namespace, $directory, $file);
