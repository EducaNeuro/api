<?php

namespace App\Http\Controllers;

use App\Services\ResponsaveisService;
use Illuminate\Http\Request;

class ResponsaveisController extends Controller
{
    public function __construct(private readonly ResponsaveisService $responsaveisService)
    {
        //
    }

}
