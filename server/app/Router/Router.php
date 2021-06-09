<?php
namespace App\Router;

class Router
{
    private static $validRoute;

    public static function set($uri,$function) {
        self::$validRoute[] = $uri;

        $function->__invoke();

    }
}