<?php

namespace App\Controllers\Api;

use App\Kernel\Controller\Controller;

class UserController extends Controller
{
    public function store(){

        dd($this->request());

        $data = [
            'username' => $this->request()->input('username'),
            'password' => password_hash($this->request()->input('password'), PASSWORD_DEFAULT),
        ];

        $id = $this->database()->insert('users', $data);

        echo "Пользователь с id=$id добавлен";
    }
}