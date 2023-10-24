<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class TestController extends Controller
{
    public function store(){
        dd($this->getRequest()->input('name'));
    }

    public function getUsers(){
        dd($this->getRequest());
    }
}