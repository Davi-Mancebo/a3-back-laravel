<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientsController;

// clients
Route::get('/client', [ClientsController::class, 'getClients'], csrf_token())->name('client.index');
Route::get('/client/{clientId}', [ClientsController::class, 'getClientById'])->name('client.show');
Route::post('/client', [ClientsController::class,'create'])->name('client.store');
Route::put('/client/{id}', [ClientsController::class,'update'])->name('client.update');
Route::delete('/client/{id}', [ClientsController::class,'destroy'])->name('client.destroy');
