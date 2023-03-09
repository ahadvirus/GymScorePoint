<?php

namespace Ahada;

class Application{

    /**
     * Summary of dispatch
     * @param string $url
     * @param \Ahada\Collections\Routes $routes
     * @param \DI\Container $container
     * @return string
     * @throws \Ahada\Exceptions\RouteNotFound
     */
    public static function dispatch($url, $routes, $container = null)
    {
        $url = empty($url) ? '/' : $url;

        foreach ($routes as $route){
            if($route->match($url)){
                $handler = new ($route->getHandler())();
                return call_user_func_array(array($handler, strtolower($_SERVER['REQUEST_METHOD'])), $route->getRouteValues($url));
            }
        }
        
        throw new \Ahada\Exceptions\RouteNotFound();
    }

}