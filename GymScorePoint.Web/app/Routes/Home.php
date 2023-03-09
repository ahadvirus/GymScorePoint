<?php

namespace App\Routes;

use App\Framework\Collections\Routes;
use App\Handlers\Index;

class Home
{
    /**
     * @param Routes $router
     * @return void
     */
    public function register($router)
    {
        $router->add('/', Index::class, 'home');
    }
}