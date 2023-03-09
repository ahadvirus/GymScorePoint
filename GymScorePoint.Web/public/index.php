<?php

require_once '..\app\Packages\Ahada\Helpers\initializer.php';

add_namespace('App\Framework\\', directory_path('app/Packages/Framework'));
add_namespace('App\\', directory_path('app/'));

App\Bootstrap::execute();

echo Ahada\Application::dispatch('', App\Framework\Collections\Routes::getInstance());

//echo Ahada\Application::dispatch()
