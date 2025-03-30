<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/



include __DIR__ . "/Api/V1/Auth.php";
include __DIR__ . "/Api/V1/Country.php";
include __DIR__ . "/Api/V1/Company.php";
