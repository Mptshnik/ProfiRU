<?php

namespace App\Controllers\Web;

use App\Kernel\Controller\Controller;

class IndexController extends Controller
{
    public function redirect(): void
    {
        $converted = $this->request()->uriParam();

        $link = $this->database()->first('links', ['converted' => $converted]);

        header("Location: ".$link['original']);
    }

    public function index(): void
    {
        echo 'Index';
    }
}
