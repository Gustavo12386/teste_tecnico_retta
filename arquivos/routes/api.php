<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeputadoController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/v2/deputados', [DeputadoController::class, 'getDeputado']);
Route::get('/v2/deputados/{id}/despesas', [DeputadoController::class, 'getDeputadoDespesas']);

