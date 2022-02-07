<?php

namespace App\Domain\Car\Actions;

use App\Domain\Car\Services\CarService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GetCarsAction extends Controller
{
    public function __invoke(Request $request, CarService $service): JsonResponse
    {
        $cars = $service->getCars();

        return response()->json(compact('cars'));
    }
}
