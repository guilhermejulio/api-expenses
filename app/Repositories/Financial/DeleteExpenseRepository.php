<?php

namespace App\Repositories\Financial;

use App\Models\Financial\Expense;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\Financial\DeleteExpenseInterface;
use Carbon\Carbon;

class DeleteExpenseRepository extends BaseRepository implements DeleteExpenseInterface
{
    public function __construct(Expense $model)
    {
        parent::__construct($model);
    }

    public function deleteExpense(int $expenseId): void
    {
        $expense = $this->model->find($expenseId);
        $expense->is_deleted = true;
        $expense->deleted_at = Carbon::now();
        $expense->save();
    }
}
