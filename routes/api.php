<?php

use App\Http\Controllers\PajakKendaraanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/pajak/kendaraan', [PajakKendaraanController::class, 'index']);
Route::get('/pajak/kendaraan/rekap', [PajakKendaraanController::class, 'rekap']);

