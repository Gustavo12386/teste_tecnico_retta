<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PainelController;

Route::get('/', [PainelController::class, 'index'])->name('painel.index');

