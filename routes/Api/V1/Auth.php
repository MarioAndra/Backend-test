<?php

use App\Http\Controllers\Api\V1\Auth\{
    LoginController,
    RegisterController
};
use Illuminate\Support\Facades\Route;

Route::prefix('users/auth/')->group(function () {
    Route::post('register', [RegisterController::class, 'create']);
    Route::post('login', [LoginController::class, 'create']);
    Route::get('logout', [LoginController::class, 'destroy'])->middleware('auth:sanctum');
});
