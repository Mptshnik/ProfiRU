<?php

namespace App\Kernel\Http;

class Request
{
    public readonly array $get;

    public readonly array $post;

    public readonly array $server;

    public readonly array $files;

    public readonly array $cookie;

    public function __construct(array $get, array $post, array $server, array $files, array $cookie)
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
        $this->files = $files;
        $this->cookie = $cookie;
    }

    public static function createInstance(): static
    {
        return new static($_GET, $_POST, $_SERVER, $_FILES, $_COOKIE);
    }

    public function uri(): string
    {
        return strtok($this->server['REQUEST_URI'], '?');
    }

    public function method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }
}
