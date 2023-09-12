<?php

namespace App\Repositories\Financial;

use App\Models\Financial\Expense;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\Financial\RetrieveExpenseInterface;

class RetrieveExpenseRepository extends BaseRepository implements RetrieveExpenseInterface
{
    public function __construct(Expense $model)
    {
        parent::__construct($model);
    }

    public function exists(int $expenseId): bool
    {
        return $this->model->where('id', $expenseId)->exists();
    }

    public function getExpenseById(int $expenseId): Expense|null
    {
        return $this->model->find($expenseId);
    }

    public function getExpenses(int $userId)
    {
        // TODO: Implement getExpenses() method.
    }

    public function getExpensesPaginated(int $userId, int $page, int $perPage)
    {
        // TODO: Implement getExpensesPaginated() method.
    }
}
