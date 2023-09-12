<?php

namespace App\Repositories\Contracts\Financial;

use App\Dto\Financial\CreateExpenseDTO;
use App\Http\Resources\Financial\ExpenseResource;

interface PersistExpenseInterface
{
    public function persistExpense(CreateExpenseDTO $expenseDTO): ExpenseResource;
}
