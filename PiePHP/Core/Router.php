<?php

namespace Core;

class Router
{

    private static $routes;

    public static function connect(string $url, array $route)
    {
        ;
        self::$routes[$url] = $route;
        $arr = [];

        if ($url === $_SERVER['REQUEST_URI']) {
            // ['controller' => 'user', 'action' => 'add']
            foreach ($route as $key => $value) {
                $arr[] = $value;
                $arr[] = $key;
            }
            $class = ucfirst($arr[0]) . ucfirst($arr[1]);
            $method = $arr[2] . ucfirst($arr[3]);

            require_once "src/Controller/" . $class . ".php";
            $class = "Controller\\" . $class;
            $obj = new $class;
            call_user_func([$obj, $method]);
        }

        // var_dump($arr);
        // echo $class;
        // echo $method;
        // echo $namespace;
    }

    public static function get($url)
    {
        if (isset(self::$routes[$url])) {
            return self::$routes[$url];
        } else {
            return null;
        }
    }
}
