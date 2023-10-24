<?php

use App\Kernel\Router\Route;

return [
    Route::get('/api/home', [\App\Controllers\IndexController::class, 'index']),
    Route::post('/api/req', [\App\Controllers\TestController::class, 'store']),
    Route::get('/api/users', [\App\Controllers\TestController::class, 'getUsers']),
    Route::get('/api/index', function () {
        echo json_encode(['index' => '123']);
    }),

    Route::post('/api/post', function () {
        echo json_encode(['index' => 'post']);
    }),
];
