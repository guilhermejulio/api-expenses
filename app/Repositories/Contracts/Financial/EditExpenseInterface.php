<?php

namespace App\Repositories\Contracts\Financial;

use App\Dto\Financial\ExpenseDTO;

interface EditExpenseInterface
{
    public function editExpense(int $expenseId, ExpenseDTO $expenseDTO);
}
