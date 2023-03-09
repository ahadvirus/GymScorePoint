<?php

namespace App;

use App\Services\RouteService;

class Bootstrap
{
    /**
     * Summary of execute
     * @return void
     */
    public static function execute()
    {
        $services = new Framework\Collections\Services();

        $services->addRange(
            RouteService::class
        );

        $services->compile();
    }
}