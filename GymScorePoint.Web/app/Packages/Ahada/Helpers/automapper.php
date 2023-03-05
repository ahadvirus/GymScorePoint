<?php


spl_autoload_register(function ($name) {
    $namespaces = array(
        "App\\"     => directory_path('app'),
        "Ahada\\"   => directory_path('app/Packages/Ahada')
    );

    foreach ($namespaces as $namespace => $address) {
        if (strpos($name, $namespace) !== false && strpos($name, $namespace) == 0) {

            $file = matching_path(sprintf('%s.php', str_replace($namespace, $address, $name)));

            require_once $file;
        }
    }
});
