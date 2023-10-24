<?php

namespace App\Kernel\Controller;

use App\Kernel\Http\Request;

abstract class Controller
{
    private Request $request;

    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @param Request $request
     */
    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }
}