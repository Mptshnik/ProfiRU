<?php

namespace App\Kernel\Container;

use App\Kernel\Database\Database;
use App\Kernel\Http\Request;
use App\Kernel\Router\Router;

class Container
{
    public readonly Request $request;
    public readonly Router $router;
    public readonly Database $database;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices():void
    {
        $this->request = new Request();
        $this->database = new Database();

        $this->router = new Router($this->request, $this->database);
    }
}