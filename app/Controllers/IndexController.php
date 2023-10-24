<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class IndexController extends Controller
{
    public function index(): void
    {
        echo json_encode(['home' => '123']);
    }
}
