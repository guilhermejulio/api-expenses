<?php

namespace App\Repositories\Contracts\Financial;

use App\Http\Resources\Financial\StatisticsResource;

interface GetStatisticsInterface
{
    public function getStatistics(int $userId): StatisticsResource;
}
