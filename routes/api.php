<?php

use App\Kernel\Router\Route;

return [
    Route::post('/api/user', [\App\Controllers\Api\UserController::class, 'store']),
    Route::post('/api/link', [\App\Controllers\Api\LinkController::class, 'store']),
];
