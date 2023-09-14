<?php

namespace App\Http\Controllers\Api\Financial;

use App\Http\Controllers\Controller;
use App\Services\Financial\GetStatisticsService;
use SharedKernel\Core\Structures\HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class GetStatisticsController extends Controller
{
    private GetStatisticsService $getStatisticsService;

    public function __construct(GetStatisticsService $getStatisticsService)
    {
        $this->getStatisticsService = $getStatisticsService;
    }

    public function get()
    {
        $response = $this->getStatisticsService->get();
        return new HttpResponse($response, Response::HTTP_OK, [], 'statistics');
    }
}
