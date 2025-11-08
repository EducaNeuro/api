<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarioHabilidadesController;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\EducadoresController;
use App\Http\Controllers\EscolasController;
use App\Http\Controllers\OrientacoesPedagogicasController;
use App\Http\Controllers\ResponsaveisController;
use App\Http\Controllers\SecretariasController;
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

    Route::post('/inventario-habilidades', [InventarioHabilidadesController::class, 'create']);

    Route::post('/metas', [MetasController::class, 'store']);
    Route::put('/metas/{id}', [MetasController::class, 'update']);
    Route::delete('/metas/{id}', [MetasController::class, 'destroy']);

    Route::post('/alunos', [AlunosController::class, 'store']);
    Route::put('/alunos/{id}', [AlunosController::class, 'update']);
    Route::delete('/alunos/{id}', [AlunosController::class, 'destroy']);

    Route::post('/secretarias', [SecretariasController::class, 'store']);
    Route::put('/secretarias/{id}', [SecretariasController::class, 'update']);
    Route::delete('/secretarias/{id}', [SecretariasController::class, 'destroy']);

    Route::post('/educadores', [EducadoresController::class, 'store']);
    Route::put('/educadores/{id}', [EducadoresController::class, 'update']);
    Route::delete('/educadores/{id}', [EducadoresController::class, 'destroy']);

    Route::post('/escolas', [EscolasController::class, 'store']);
    Route::put('/escolas/{id}', [EscolasController::class, 'update']);
    Route::delete('/escolas/{id}', [EscolasController::class, 'destroy']);

    Route::post('/responsaveis', [ResponsaveisController::class, 'store']);
    Route::put('/responsaveis/{id}', [ResponsaveisController::class, 'update']);
    Route::delete('/responsaveis/{id}', [ResponsaveisController::class, 'destroy']);
});
