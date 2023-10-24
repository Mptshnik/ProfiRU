<?php

namespace App\Kernel\Router;

class Route
{
    private string $uri;

    private string $method;

    private $action;

    public function __construct(string $uri, string $method, $action)
    {
        $this->uri = $uri;
        $this->method = $method;
        $this->action = $action;
    }

    public static function get(string $uri, $action)
    {
        return new static($uri, 'GET', $action);
    }

    public static function post(string $uri, $action)
    {
        return new static($uri, 'POST', $action);
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}
