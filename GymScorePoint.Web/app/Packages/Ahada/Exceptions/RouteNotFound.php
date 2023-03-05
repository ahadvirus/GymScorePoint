<?php

namespace Ahada\Exceptions;

class RouteNotFound extends \Exception
{
    /**
     * Summary of __construct
     * @param string $message 
     */
    public function __construct($message = ''){
        parent::__construct($message);
    }
}