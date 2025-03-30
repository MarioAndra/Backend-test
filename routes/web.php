<?php

use App\Http\Controllers\Api\V1\InquiriesController;
use App\Http\Controllers\Api\V1\Blade\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::middleware(['auth'])->group(function () {
    Route::get('/inquiries', [InquiriesController::class, 'create'])->name('inquiries.create');
    Route::post('/inquiries', [InquiriesController::class, 'store'])->name('inquiries.store');
});
