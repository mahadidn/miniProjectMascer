<?php
namespace Mdn\MiniProjectSekolah\App;

class Router {

    private static array $routes = [];

    public static function add(string $method,
                               string $path,
                               string $controller,
                               string $function,
                               array $middleware = []): void{

        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function,
            'middleware' => $middleware
        ];

    }

    public static function run(): void {
        $path = "/";
        if (isset($_SERVER['PATH_INFO'])){
            $path = $_SERVER['PATH_INFO'];
        }
        $method = $_SERVER['REQUEST_METHOD'];

        foreach(self::$routes as $route){
            $pattern = "#^" . $route['path'] . "$#";
            if (preg_match($pattern, $path, $variabels) && $method == $route['method']){

                foreach($route['middleware'] as $middleware){
                    $instance = new $middleware;
                    $instance->before();
                }

                $function = $route['function'];
                $controller = new $route['controller'];

                array_shift($variabels);
                call_user_func_array([$controller, $function], $variabels);

                return;
            }
        }
        http_response_code(404);
        echo "Error 404 Page Not Found";
    }

}

