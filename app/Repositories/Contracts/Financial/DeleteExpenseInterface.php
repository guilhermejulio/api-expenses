<?php

namespace App\Repositories\Contracts\Financial;

interface DeleteExpenseInterface
{
    public function deleteExpense(int $expenseId);
}
