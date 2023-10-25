<?php

namespace App\Controllers\Api;

use App\Kernel\Controller\Controller;

class LinkController extends Controller
{
    public function store():void
    {
        $original = $this->request()->input('original');

        $converted = $this->getRandomString();

        $data = [
            'original' => $original,
            'converted' => $converted,
            'user_id' => 1,
        ];

        $id = $this->database()->insert('links', $data);


        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'message' => "Ссылка с id=$id добавлена",
            'converted_link' => ENV['APP_URL'] . '/' . $converted
        ]);
    }

    private function getRandomString(): string
    {
        $str = "_01234567890".implode(array_merge(range('A', 'Z'), range('a', 'z')));

        $randomNumber = rand(6, 10);
        $randomString = substr(str_shuffle($str), 0, $randomNumber);
        return $randomString;
    }
}