<?php

namespace App\Http\Resources\Financial;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserExpensesResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => ExpenseResource::collection($this->collection)
        ];
    }
}
