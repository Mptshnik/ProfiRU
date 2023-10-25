<?php

namespace App\Kernel\Router;

use App\Kernel\Database\Database;
use App\Kernel\Http\Request;

class Router
{
    private Request $request;
    private Database $database;
    /**
     * @var Route[]
     */
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct(Request $request, Database $database)
    {
        $this->request = $request;
        $this->database = $database;
        $this->initRoutes();
    }

    public function handle(string $uri, string $method): void
    {
        $route = $this->findRoute($uri, $method);

        if (! $route) {
            $this->notFound();
        }

        if (is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();

            $controller = new $controller();

            call_user_func([$controller, 'setRequest'], $this->request);
            call_user_func([$controller, 'setDatabase'], $this->database);
            call_user_func([$controller, $action]);
        } else {
            call_user_func($route->getAction());
        }
    }

    private function notFound(): void
    {
        http_response_code(404);
        echo json_encode('404 | Not found');
        exit;
    }

    private function findRoute(string $uri, string $method): Route|false
    {
        foreach ($this->routes[$method] as $route){
            $pattern = '/\/{[^\/]+}$/';
            $result = preg_replace($pattern, '', $route->getUri());

            if(str_contains($uri, $result)){
                return $this->routes[$method][$route->getUri()];
            }
        }

        return false;
    }

    /**
     * @return Route[]
     */
    private function getRoutes(): array
    {
        return array_merge(require APP_PATH.'/routes/api.php', require APP_PATH.'/routes/web.php');
    }

    private function initRoutes(): void
    {
        $routes = $this->getRoutes();

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }
}
