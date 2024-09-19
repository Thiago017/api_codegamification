<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstitutionController;
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
});


