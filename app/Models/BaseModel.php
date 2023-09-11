<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class BaseModel
 *
 * @package App\Models
 * @mixin Builder
 */
class BaseModel extends Model
{
    public function toArray(): array
    {
        return array_map(function ($value) {
            if ($value instanceof \DateTimeInterface) {
                return $value->format('d/m/y H:i');
            }

            return $value;
        }, parent::toArray());
    }
}
