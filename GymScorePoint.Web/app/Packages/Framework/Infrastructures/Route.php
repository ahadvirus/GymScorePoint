<?php

namespace App\Framework\Infrastructures;

interface Route
{
    /**
     * @param \App\Framework\Collections\Routes $router
     * @return void
     */
    public function register($router);
}