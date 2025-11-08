<?php

namespace App\Http\Controllers;

use App\Services\SecretariasService;
use Illuminate\Http\Request;

class SecretariasController extends Controller
{
    public function __construct(private readonly SecretariasService $secretariasService)
    {
        //
    }

}
