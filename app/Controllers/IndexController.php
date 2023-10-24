<?php

namespace App\Controllers;

class IndexController
{
    public function index(): void
    {
        echo json_encode(['home' => '123']);
    }
}
