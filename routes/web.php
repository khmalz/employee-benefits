<?php

use App\Http\Controllers\EmployeeControlller;
use App\Http\Controllers\HistoryBenefitController;
use App\Http\Controllers\BenefitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestBenefitController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/request-benefit', RequestBenefitController::class)->name('request');
Route::get('/history-benefit', HistoryBenefitController::class)->name('benefit.history');

Route::resource('benefit', BenefitController::class);
Route::get('/benefit-done', [BenefitController::class, 'done'])->name('benefit.done');

Route::resource('employee', EmployeeControlller::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
