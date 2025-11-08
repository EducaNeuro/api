<?php

namespace App\Http\Controllers;

use App\Services\EscolasService;
use Illuminate\Http\Request;

class EscolasController extends Controller
{
    public function __construct(private readonly EscolasService $escolasService)
    {
        //
    }

}
