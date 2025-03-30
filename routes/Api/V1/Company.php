<?php

use App\Http\Controllers\Api\V1\{
    CompaniesController,
    InquiriesController
};
use Illuminate\Support\Facades\Route;


Route::middleware([
    'auth:sanctum',
])
    ->group(function () {
        Route::apiResource('companies', CompaniesController::class);
    });
