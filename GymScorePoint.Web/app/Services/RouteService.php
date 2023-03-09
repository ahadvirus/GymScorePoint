<?php

namespace App\Services;

use App\Framework\Collections\Routes;
use App\Framework\Infrastructures\Route;
use App\Framework\Infrastructures\Service;
use App\Routes\Home;

class RouteService extends Service
{
    public function register()
    {
        $method = (new \ReflectionClass(Route::class))->getMethods()[0];

        foreach ([Home::class] as $route) {
            try {
                (new \ReflectionClass($route))->getMethod($method->getName());
                $route = new $route();
                call_user_func_array([$route, $method->getName()], [Routes::getInstance()]);
            } catch (\Exception $exception) {
                continue;
            }
        }
    }
}