<?php

namespace App\Repositories\Contracts\Financial;

use App\Dto\Financial\ExpenseDTO;
use App\Http\Resources\Financial\ExpenseResource;

interface PersistExpenseInterface
{
    public function persistExpense(ExpenseDTO $expenseDTO): ExpenseResource;
}
