<?php

namespace App\Kernel;

use App\Kernel\Http\Request;
use App\Kernel\Router\Router;

class App
{
    public function run(): void
    {
        $router = new Router();
        $request = Request::createInstance();

        $router->handle($request->uri(), $request->method());
    }
}
