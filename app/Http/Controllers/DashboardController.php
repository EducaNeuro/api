<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    public function __construct(private readonly DashboardService $dashboardService)
    {
        //
    }

    /**
     * Retorna estatísticas gerais do sistema
     *
     * @return JsonResponse
     */
    public function statistics(): JsonResponse
    {
        $statistics = $this->dashboardService->getStatistics();

        return response()->json($statistics);
    }
}
