<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientsController;

// clients
Route::get('/client', [ClientsController::class, 'getClients'])->name('client.index');

Route::get('/client/{client}', [ClientsController::class, 'getClientById'])->name('client.show');
