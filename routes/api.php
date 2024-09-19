<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('institutions', [InstitutionController::class, 'findAll'])->name('institution.findAll');
    Route::get('institutions/{id}', [InstitutionController::class, 'findById'])->name('institution.findById');
    Route::post('institutions', [InstitutionController::class, 'store'])->name('institution.store');
    Route::put('institutions/{id}', [InstitutionController::class, 'update'])->name('institution.update');
    Route::delete('institutions/{id}', [InstitutionController::class, 'delete'])->name('institution.delete');

    Route::get('users', [UserController::class, 'findAll'])->name('user.findAll');
    Route::get('users/{id}', [UserController::class, 'findById'])->name('user.findById');
    Route::post('users', [UserController::class, 'store'])->name('user.store');
    Route::put('users/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('users/{id}', [UserController::class, 'delete'])->name('user.delete');
});


