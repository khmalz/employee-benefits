<?php

use App\Http\Controllers\Admin\EmployeeControlller;
use App\Http\Controllers\HistoryBenefitController;
use App\Http\Controllers\BenefitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestBenefitController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::resource('employee', EmployeeControlller::class);

        Route::get('/benefit', [BenefitController::class, 'index'])->name('benefit.index');
        Route::get('/benefit-done', [BenefitController::class, 'done'])->name('benefit.done');
        Route::get('/benefit/{id}', [BenefitController::class, 'show'])->name('benefit.show');
    });

    Route::middleware('role:employee')->group(function () {
        Route::resource('benefit', BenefitController::class)->except('index', 'show');
        Route::get('/request-benefit', RequestBenefitController::class)->name('request');
        Route::get('/history-benefit', HistoryBenefitController::class)->name('benefit.history');

        Route::get('employee/benefits/{employee}', function (\App\Models\Employee $employee) {
            return $employee->only('nik', 'kesehatan', 'bencana', 'transportasi', 'jabatan', 'makanan');
        });
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
