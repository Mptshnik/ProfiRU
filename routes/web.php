<?php

use App\Kernel\Router\Route;

return [
    Route::get('/{param}', [\App\Controllers\Web\IndexController::class, 'index']),
];
