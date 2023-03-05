<?php

namespace Ahada;

class Application{

    /**
     * Summary of dispatch
     * @param string $url
     * @param \Ahada\Collections\Routes $routes
     * @return string
     * @throws \Ahada\Exceptions\RouteNotFound
     */
    public static function dispatch($url, $routes)
    {
        foreach ($routes as $route){
            if($route->match($url)){
                return call_user_func_array(array($route->getHandler(), strtolower($_SERVER['REQUEST_METHOD'])), $route->getRouteValues($url));
            }
        }
        
        throw new \Ahada\Exceptions\RouteNotFound();
    }

}