<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrientacoesPedagogicasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('jwt')->group(function () {
    Route::get('/auth/me', function (Request $request) {
        return $request->attributes->get('educador');
    });

    Route::post('/orientacoes-pedagogicas', [OrientacoesPedagogicasController::class, 'store']);
    Route::put('/orientacoes-pedagogicas/{id}', [OrientacoesPedagogicasController::class, 'update']);
    Route::delete('/orientacoes-pedagogicas/{id}', [OrientacoesPedagogicasController::class, 'destroy']);
});
