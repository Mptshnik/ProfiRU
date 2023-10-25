<?php

namespace App\Kernel\Http;

class Request
{
    public readonly array $get;

    public readonly array $post;

    public readonly array $server;

    public readonly array $files;

    public readonly array $cookie;

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->server = $_SERVER;
        $this->files = $_FILES;
        $this->cookie = $_COOKIE;
    }

    public function uriParam(): string
    {
        $parts = explode('/', $this->uri());
        return end($parts);
    }

    public function uri(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function input(string $key, $default = null):mixed
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }
}
