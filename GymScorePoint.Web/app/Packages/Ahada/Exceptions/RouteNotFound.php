<?php

namespace Ahada\Exceptions;

class RouteNotFound extends \Exception
{
    public function __construct(){
        parent::__construct('');
    }
}