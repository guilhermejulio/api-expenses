<?php

namespace App\Repositories\Contracts\Financial;

use App\Dto\Financial\ExpenseDTO;

interface PersistExpenseInterface
{
    public function persistExpense(ExpenseDTO $expenseDTO);
}
