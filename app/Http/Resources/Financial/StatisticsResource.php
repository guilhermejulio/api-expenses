<?php

namespace App\Http\Resources\Financial;

use App\Dto\Financial\GetStatisticsDTO;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StatisticsResource extends JsonResource
{
    public function toArray(Request $request)
    {
        /** @var GetStatisticsDTO $this */
        return [
            'total' => number_format($this->getTotal(), 2),
            'expensesCount' => $this->getExpensesCount(),
        ];
    }
}
