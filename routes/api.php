<?php

use App\Http\Controllers\ProntuarioController;
use Illuminate\Support\Facades\Route;

Route::post('/prontuarios', [ProntuarioController::class, 'store'])->name('prontuarios.store');
