<?php

namespace App\Services\Financial;

use App\Http\Resources\Financial\StatisticsResource;
use App\Repositories\Contracts\Financial\GetStatisticsInterface;
use Illuminate\Support\Facades\Auth;

class GetStatisticsService
{
    private GetStatisticsInterface $getStatisticsRepository;

    public function __construct(GetStatisticsInterface $repository)
    {
        $this->getStatisticsRepository = $repository;
    }

    public function get(): StatisticsResource
    {
        $userId = Auth::user()->id;
        return $this->getStatisticsRepository->getStatistics($userId);
    }
}
