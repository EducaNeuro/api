<?php

namespace App\Http\Controllers;

use App\Services\EducadoresService;
use Illuminate\Http\Request;

class EducadoresController extends Controller
{
    public function __construct(private readonly EducadoresService $educadoresService)
    {
        //
    }

}
