<?php

namespace App\Http\Controllers;

use App\Services\MetasService;
use Illuminate\Http\Request;

class MetasController extends Controller
{
    public function __construct(private readonly MetasService $metasService)
    {
        //
    }

}
