<?php

namespace App\Framework\Infrastructures;

trait Singleton
{
    /**
     * @var \Ahada\Collections\Namespaces
     */
    private static $instance;

    /**
     * @return \Ahada\Collections\Namespaces
     */
    public static function getInstance()
    {
        if(self::$instance == null){
            self::$instance = new self();
        }

        return self::$instance;
    }

    protected abstract function constructor();

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

    private function __construct()
    {
        $this->constructor();
    }
}