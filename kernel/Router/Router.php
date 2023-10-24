<?php

namespace App\Kernel\Router;

use App\Kernel\Http\Request;

class Router
{
    private Request $request;
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->initRoutes();
    }

    public function handle(string $uri, string $method): void
    {
        //header('Content-Type: application/json; charset=utf-8');
        $route = $this->findRoute($uri, $method);

        if (! $route) {
            $this->notFound();
        }

        if (is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();

            $controller = new $controller();

            call_user_func([$controller, 'setRequest'], $this->request);
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
        if (! isset($this->routes[$method][$uri])) {
            return false;
        }

        return $this->routes[$method][$uri];
    }

    /**
     * @return Route[]
     */
    private function getRoutes(): array
    {
        return require APP_PATH.'/routes/api.php';
    }

    private function initRoutes(): void
    {
        $routes = $this->getRoutes();

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }
}
