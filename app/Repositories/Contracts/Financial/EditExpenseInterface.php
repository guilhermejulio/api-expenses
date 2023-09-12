<?php

namespace App\Repositories\Contracts\Financial;

use App\Dto\Financial\EditExpenseDTO;
use App\Http\Resources\Financial\ExpenseResource;

interface EditExpenseInterface
{
    public function editExpense(int $expenseId, EditExpenseDTO $expenseDTO): ExpenseResource;
}
