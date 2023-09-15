<?php

namespace App\Http\Resources\Financial;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
{
    public function __construct($resource)
    {
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'date' => Carbon::parse($this->date)->format('d/m/Y'),
            'fk_user_id' => $this->fk_user_id,
            'amount' => $this->amount,
            'created_at' => Carbon::parse($this->created_at)->format('d/m/Y H:i'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d/m/Y H:i'),
        ];
    }
}
