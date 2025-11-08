<?php

namespace App\Http\Controllers;

use App\Services\OrientacoesPedagogicasService;
use Illuminate\Http\Request;

class OrientacoesPedagogicasController extends Controller
{
    public function __construct(private readonly OrientacoesPedagogicasService $orientacoesPedagogicasService)
    {
        //
    }

}
