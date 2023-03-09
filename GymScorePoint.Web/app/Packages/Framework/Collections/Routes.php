<?php

namespace App\Framework\Collections;

use \Ahada\Collections\Routes as RouteCollection;

class Routes extends RouteCollection
{
    /**
     * @var \App\Framework\Collections\Routes
     */
    private static $instance;

    /**
     * @return \App\Framework\Collections\Routes
     */
    public static function getInstance()
    {
        if(self::$instance == null){
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct()
    {
        parent::__construct();
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * Singleton instance.
     *
     * @return void
     */
    private function __clone()
    {
        // Don't do anything, we don't want to be cloned
    }

    /**
     * Private unserialize method to prevent unserializing of the Singleton
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
        // Don't do anything, we don't want to be unserialized
    }

}