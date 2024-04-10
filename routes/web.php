<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\VerifiedCardController;

use App\Http\Controllers\GenerateCardController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//employee route

Route::middleware('auth')->group(function () {

    Route::prefix('admi-panel')->group(function(){

        Route::resource('role', RoleController::class)
        ->missing(function () {
            return Redirect::route('welcome');
        });

        Route::get('/dashboard', function () {
            return view('adminPanel.index');
        })->middleware(['auth', 'verified'])->name('admin.dashboard');

        Route::resource('employee', EmployeeController::class)
        ->missing(function () {
            return Redirect::route('welcome');
        });

        Route::resource('card', CardController::class)
        ->only(['show','store','create','index','destroy'])
        ->missing(function () {
            return Redirect::route('welcome');
        });

       Route::get('/download-qr-code/{card}', [GenerateCardController::class, 'downloadQrcode'])->name('qr.download-qrcode');

    });

});

Route::get('/qrcode/{attr1}/{attr2}', [VerifiedCardController::class, 'index'])->name('verified-qr.index');

require __DIR__.'/auth.php';
