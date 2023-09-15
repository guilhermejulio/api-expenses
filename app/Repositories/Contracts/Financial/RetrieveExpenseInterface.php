<?php

namespace App\Repositories\Contracts\Financial;

use App\Http\Resources\Financial\ExpenseResource;
use App\Http\Resources\Financial\UserExpensesResource;

interface RetrieveExpenseInterface
{
    public function retrieveExpensesFromUser(int $userId): UserExpensesResource;

    public function getById(int $expenseId): ExpenseResource;
}
