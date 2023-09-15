<?php

namespace App\Repositories\Financial;

use App\Http\Resources\Financial\ExpenseResource;
use App\Http\Resources\Financial\UserExpensesResource;
use App\Models\Financial\Expense;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\Financial\RetrieveExpenseInterface;

class RetrieveExpenseRepository extends BaseRepository implements RetrieveExpenseInterface
{
    public function __construct(Expense $model)
    {
        parent::__construct($model);
    }

    public function retrieveExpensesFromUser(int $userId): UserExpensesResource
    {
        $expenses = $this->model
            ->where('fk_user_id', $userId)
            ->where('is_deleted', false)
            ->get();
        return new UserExpensesResource($expenses);
    }

    public function getById(int $expenseId): ExpenseResource
    {
        $expense = $this->model
            ->where('id', $expenseId)
            ->where('is_deleted', false)
            ->firstOrFail();
        return new ExpenseResource($expense);
    }
}
