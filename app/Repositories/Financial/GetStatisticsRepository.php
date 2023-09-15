<?php

namespace App\Repositories\Financial;

use App\Dto\Financial\GetStatisticsDTO;
use App\Http\Resources\Financial\StatisticsResource;
use App\Models\Financial\Expense;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\Financial\GetStatisticsInterface;

class GetStatisticsRepository extends BaseRepository implements GetStatisticsInterface
{
    public function __construct(Expense $model)
    {
        parent::__construct($model);
    }

    public function getStatistics(int $userId): StatisticsResource
    {
        $expenses = $this->model
            ->where('fk_user_id', $userId)
            ->where('is_deleted', false)
            ->get();
        $statistics = new GetStatisticsDTO($expenses->sum('amount'), $expenses->count());
        return new StatisticsResource($statistics);
    }
}
