<?php

namespace App\Http\Controllers;

use App\Services\AnexosService;
use Illuminate\Http\Request;

class AnexosController extends Controller
{
    public function __construct(private readonly AnexosService $anexosService)
    {
        //
    }

}
