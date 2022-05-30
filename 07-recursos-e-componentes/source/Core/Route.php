<?php

namespace Source\Core;

class Route
{
    protected static $route;

    public static function get(string $route, $handler): void
    {
        $get = "/" . filter_input(INPUT_GET, "url", FILTER_SANITIZE_SPECIAL_CHARS);

        self::$route = [
            $route => [
                "route" => $route,
                "controller" => (!is_string($handler) ? $handler : strstr($handler, ":", true)),
                "method" => (!is_string($handler) ?: str_replace(":", "", strstr($handler, ":", false))),
            ]
        ];

        self::dispatch($get);
    }

    public static function dispatch($route): void
    {
        $route = (self::$route[$route] ?? []);

        if ($route) {
            if ($route['controller'] instanceof \Closure) {
                call_user_func($route['controller']);
                return;
            }

            $controller = self::namespace() . $route['controller'];
            $method = $route['method'];

            if (class_exists($controller)) {
                $newController = new $controller;
                if (method_exists($controller, $method)) {
                    $newController->$method();
                }
            }
        }
    }

    public function routes(): array
    {
        return self::$route;
    }

    private static function namespace(): string
    {
        return "Source\App\Controllers\\";
    }
}