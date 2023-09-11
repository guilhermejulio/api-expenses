<?php

namespace App\Models\Financial;

use App\Models\BaseModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Expense
 *
 * @property int $id
 * @property string $description
 * @property Carbon $date
 * @property int $fk_user_id
 * @property float $amount
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models\Financial
 */
class Expense extends BaseModel
{
    protected $table = 'expenses';

    protected $fillable = [
        'description',
        'date',
        'fk_user_id',
        'amount',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'fk_user_id');
    }
}
