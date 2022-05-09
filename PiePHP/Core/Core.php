<?php
namespace Core;

/*
// Routage static get

class Core
{
public function run()
{
require_once('src/routes.php');

if($get = \Core\Route::get($_SRVER["REQUEST_URI"]))
{
$controller = $get['controller'] . "Controller";
$action = $get['action'] . "Action";

if(method_exists($controller, $action) && class_exists($controller))
{
$instance = new $controller();
$instance->$action();
}
}
}
}
 */

/*
// Routage static register

class Core
{
public function run()
{
require_once('src/routes.php');

if($get = \Core\autoload::register($_SERVER["REQUEST_URI"]))
{
$controller = $get['controller'] . "Controller";
$action = $get['action'] . "Action";

if(method_exists($controller, $action) && class_exists($controller))
{
$instance = new $controller();
$instance->$action();
}
}
}
}
 */

/* if (!empty($url[1])) {
$controller = ucfirst($url[1]);
$action = $url[2];
echo $action;
require_once 'src/Controller/' . $controller . 'Controller.php';
$controller = new $controller();
if (method_exists($controller, $action)) {
call_user_func([$controller, $action]);
}
} else {
echo "C'est Vide";
}
 */

class Core
{
    public function __construct()
    {
        require_once "src/routes.php";
    }

    public function run()
    {
        $params = explode("/", $_SERVER['REQUEST_URI']);
        //var_dump($params);
        unset($params[0]);
        var_dump($params);

        if ($params[1] !== "") {
            $class =  ucfirst($params[1]) . "Controller";
            if (file_exists("src/Controller/" . $class . ".php")) {
                require_once "src/Controller/" . $class . ".php";
                $method = $params[2] . "Action";
                $class = '\Controller\\' . $class;
                if  (method_exists(new $class, $method)) {
                    Router::connect($_SERVER['REQUEST_URI'], ['controller' => $params[1], 'action' => $params[2]]);
                } else {
                    Router::connect($_SERVER['REQUEST_URI'], ['controller' => $params[1], 'action' => 'error']);
                }
            }
        }
    }
}
