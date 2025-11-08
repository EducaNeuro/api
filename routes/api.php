<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarioHabilidadesController;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\AlunosController;
use App\Http\Controllers\DiagnosticosController;
use App\Http\Controllers\EducadoresController;
use App\Http\Controllers\EntrevistaFamiliarController;
use App\Http\Controllers\EscolasController;
use App\Http\Controllers\HabilidadesController;
use App\Http\Controllers\OrientacoesPedagogicasController;
use App\Http\Controllers\PlanoTrimestralController;
use App\Http\Controllers\PlanejamentoController;
use App\Http\Controllers\RegistroPedagogicoController;
use App\Http\Controllers\ResponsaveisController;
use App\Http\Controllers\SecretariasController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('jwt')->group(function () {
    Route::get('/auth/me', [AuthController::class, 'me']);

    Route::get('/orientacoes-pedagogicas', [OrientacoesPedagogicasController::class, 'index']);
    Route::get('/orientacoes-pedagogicas/{id}', [OrientacoesPedagogicasController::class, 'show']);
    Route::post('/orientacoes-pedagogicas', [OrientacoesPedagogicasController::class, 'store']);
    Route::put('/orientacoes-pedagogicas/{id}', [OrientacoesPedagogicasController::class, 'update']);
    Route::delete('/orientacoes-pedagogicas/{id}', [OrientacoesPedagogicasController::class, 'destroy']);

    Route::get('/inventario-habilidades', [InventarioHabilidadesController::class, 'index']);
    Route::get('/inventario-habilidades/{id}', [InventarioHabilidadesController::class, 'show']);
    Route::post('/inventario-habilidades', [InventarioHabilidadesController::class, 'create']);

    Route::get('/metas', [MetasController::class, 'index']);
    Route::get('/metas/{id}', [MetasController::class, 'show']);
    Route::post('/metas', [MetasController::class, 'store']);
    Route::put('/metas/{id}', [MetasController::class, 'update']);
    Route::delete('/metas/{id}', [MetasController::class, 'destroy']);

    Route::post('/habilidades', [HabilidadesController::class, 'store']);
    Route::put('/habilidades/{id}', [HabilidadesController::class, 'update']);
    Route::delete('/habilidades/{id}', [HabilidadesController::class, 'destroy']);

    Route::post('/entrevista-familiar', [EntrevistaFamiliarController::class, 'store']);
    Route::put('/entrevista-familiar/{id}', [EntrevistaFamiliarController::class, 'update']);
    Route::delete('/entrevista-familiar/{id}', [EntrevistaFamiliarController::class, 'destroy']);

    Route::get('/alunos', [AlunosController::class, 'index']);
    Route::get('/alunos/{id}', [AlunosController::class, 'show']);
    Route::post('/alunos', [AlunosController::class, 'store']);
    Route::put('/alunos/{id}', [AlunosController::class, 'update']);
    Route::delete('/alunos/{id}', [AlunosController::class, 'destroy']);

    Route::get('/secretarias', [SecretariasController::class, 'index']);
    Route::get('/secretarias/{id}', [SecretariasController::class, 'show']);
    Route::post('/secretarias', [SecretariasController::class, 'store']);
    Route::put('/secretarias/{id}', [SecretariasController::class, 'update']);
    Route::delete('/secretarias/{id}', [SecretariasController::class, 'destroy']);

    Route::get('/educadores', [EducadoresController::class, 'index']);
    Route::get('/educadores/{id}', [EducadoresController::class, 'show']);
    Route::post('/educadores', [EducadoresController::class, 'store']);
    Route::put('/educadores/{id}', [EducadoresController::class, 'update']);
    Route::delete('/educadores/{id}', [EducadoresController::class, 'destroy']);

    Route::get('/escolas', [EscolasController::class, 'index']);
    Route::get('/escolas/{id}', [EscolasController::class, 'show']);
    Route::post('/escolas', [EscolasController::class, 'store']);
    Route::put('/escolas/{id}', [EscolasController::class, 'update']);
    Route::delete('/escolas/{id}', [EscolasController::class, 'destroy']);

    Route::get('/responsaveis', [ResponsaveisController::class, 'index']);
    Route::get('/responsaveis/{id}', [ResponsaveisController::class, 'show']);
    Route::post('/responsaveis', [ResponsaveisController::class, 'store']);
    Route::put('/responsaveis/{id}', [ResponsaveisController::class, 'update']);
    Route::delete('/responsaveis/{id}', [ResponsaveisController::class, 'destroy']);

    Route::get('/planejamentos', [PlanejamentoController::class, 'index']);
    Route::get('/planejamentos/{id}', [PlanejamentoController::class, 'show']);
    Route::post('/planejamentos', [PlanejamentoController::class, 'store']);
    Route::put('/planejamentos/{id}', [PlanejamentoController::class, 'update']);
    Route::delete('/planejamentos/{id}', [PlanejamentoController::class, 'destroy']);

    Route::get('/planos-trimestrais', [PlanoTrimestralController::class, 'index']);
    Route::get('/planos-trimestrais/{id}', [PlanoTrimestralController::class, 'show']);
    Route::post('/planos-trimestrais', [PlanoTrimestralController::class, 'store']);
    Route::put('/planos-trimestrais/{id}', [PlanoTrimestralController::class, 'update']);
    Route::delete('/planos-trimestrais/{id}', [PlanoTrimestralController::class, 'destroy']);

    Route::get('/registros-pedagogicos', [RegistroPedagogicoController::class, 'index']);
    Route::get('/registros-pedagogicos/{id}', [RegistroPedagogicoController::class, 'show']);
    Route::post('/registros-pedagogicos', [RegistroPedagogicoController::class, 'store']);
    Route::put('/registros-pedagogicos/{id}', [RegistroPedagogicoController::class, 'update']);
    Route::delete('/registros-pedagogicos/{id}', [RegistroPedagogicoController::class, 'destroy']);

    Route::get('/diagnosticos', [DiagnosticosController::class, 'index']);
    Route::get('/diagnosticos/{id}', [DiagnosticosController::class, 'show']);
    Route::post('/diagnosticos', [DiagnosticosController::class, 'store']);
    Route::put('/diagnosticos/{id}', [DiagnosticosController::class, 'update']);
    Route::delete('/diagnosticos/{id}', [DiagnosticosController::class, 'destroy']);
});
