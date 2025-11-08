<?php

namespace App\Http\Controllers;

use App\Services\EntrevistaFamiliarService;
use Illuminate\Http\Request;

class EntrevistaFamiliarController extends Controller
{
    public function __construct(private readonly EntrevistaFamiliarService $entrevistaFamiliarService)
    {
        //
    }

}
