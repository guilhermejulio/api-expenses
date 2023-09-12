<?php

namespace App\Repositories\Contracts\Financial;

use App\Models\Financial\Expense;

interface RetrieveExpenseInterface
{
    public function exists(int $expenseId): bool;

    public function getExpenses(int $userId);

    public function getExpensesPaginated(int $userId, int $page, int $perPage);

    public function getExpenseById(int $expenseId): Expense|null;
}
