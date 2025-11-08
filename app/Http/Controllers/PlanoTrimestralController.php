<?php

namespace App\Http\Controllers;

use App\Services\PlanoTrimestralService;
use Illuminate\Http\Request;

class PlanoTrimestralController extends Controller
{
    public function __construct(private readonly PlanoTrimestralService $planoTrimestralService)
    {
        //
    }

}
