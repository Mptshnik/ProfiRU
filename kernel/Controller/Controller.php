<?php

namespace App\Kernel\Controller;

use App\Kernel\Database\Database;
use App\Kernel\Http\Request;

abstract class Controller
{
    private Request $request;
    private Database $database;

    /**
     * @return Database
     */
    public function database(): Database
    {
        return $this->database;
    }

    /**
     * @param Database $database
     */
    public function setDatabase(Database $database): void
    {
        $this->database = $database;
    }

    /**
     * @return Request
     */
    public function request(): Request
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