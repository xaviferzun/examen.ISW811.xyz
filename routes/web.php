<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

//Listado de solicitudes
Route::get('/', [TicketController::class, 'index'])->name('home');

//CRUD de solicitudes
Route::resource('tickets', TicketController::class)->except('show');