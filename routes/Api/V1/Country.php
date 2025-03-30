<?php

use App\Http\Controllers\Api\V1\{
    CountriesController
};
use Illuminate\Support\Facades\Route;


Route::middleware([
    'auth:sanctum',
])
    ->group(function () {
        Route::apiResource('countries', CountriesController::class);
    });
