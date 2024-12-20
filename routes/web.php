<?php

use App\Http\Controllers\ClientsEnrollmentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;

Route::get('/test', function () {
    return view('welcome'); // Nome do arquivo Blade (sem extensão .blade.php)
});

// User
Route::get('/user', [UserController::class,'getUsers'])->name('user.index');
Route::get('/user/{id}', [UserCOntroller::class, 'getUserById'])->name('user.show');
Route::post('/user/create', [UserController::class, 'store'])->name('user.store');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

//auth
Route::post('/login', [UserController::class, 'login'])->name('auth.store');

// clients
Route::get('/client', [ClientsController::class, 'getClients'])->name('client.index');
Route::get('/client/{clientId}', [ClientsController::class, 'getClientById'])->name('client.show');
Route::post('/client', [ClientsController::class, 'create'])->name('client.store');
Route::put('/client/{id}', [ClientsController::class, 'update'])->name('client.update');
Route::delete('/client/{id}', [ClientsController::class, 'destroy'])->name('client.destroy');

// enrollments
Route::get('/enrollment', [ClientsEnrollmentController::class, 'get'])->name('enrollment.index');
Route::get('/enrollment/client/{id}', [ClientsEnrollmentController::class, 'getEnrollmentByClientId'])->name('enrollment.client.show');
Route::get('/enrollment/student/{id}', [ClientsEnrollmentController::class, 'getEnrollmentByStudentId'])->name('enrollment.student.show');
Route::post('/enrollment', [ClientsEnrollmentController::class, 'create'])->name('enrollment.store');
Route::put('/enrollment/{id}', [ClientsEnrollmentController::class, 'update'])->name('enrollment.update');
Route::delete('/enrollment/{id}', [ClientsEnrollmentController::class, 'destroy'])->name('enrollment.destroy');
