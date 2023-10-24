<?php

use App\Kernel\Router\Route;

return [
    Route::get('/api/home', [\App\Controllers\IndexController::class, 'index']),
    Route::get('/api/index', function () {
        echo json_encode(['index' => '123']);
    }),
];
