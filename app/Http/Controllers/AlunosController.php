<?php

namespace App\Http\Controllers;

use App\Services\AlunosService;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    public function __construct(private readonly AlunosService $alunosService)
    {
        //
    }

}
