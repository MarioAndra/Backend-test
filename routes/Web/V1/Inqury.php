
<?php

use App\Http\Controllers\Api\V1\InquiriesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/inquiries', [InquiriesController::class, 'create'])->name('inquiries.create');
    Route::post('/inquiries', [InquiriesController::class, 'store'])->name('inquiries.store');
});
