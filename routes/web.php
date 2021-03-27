<?php

use App\Http\Controllers\BeerController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/brewery/{id}/beers', [BeerController::class, 'index'])->name('brewery.beers');
