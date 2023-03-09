<?php

namespace App\Framework\Infrastructures;

abstract class Service
{
    public $services;

    /*
     * @return void
     */
    public abstract function register();
}