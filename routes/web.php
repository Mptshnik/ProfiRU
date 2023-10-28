<?php

use App\Kernel\Router\Route;

return [
    Route::get('/', [\App\Controllers\Web\IndexController::class, 'index']),
    Route::get('/{param}', [\App\Controllers\Web\IndexController::class, 'redirect']),
];
