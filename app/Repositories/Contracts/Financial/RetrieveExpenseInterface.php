<?php

namespace App\Repositories\Contracts\Financial;

use App\Http\Resources\Financial\UserExpensesResource;

interface RetrieveExpenseInterface
{
    public function retrieveExpensesFromUser(int $userId): UserExpensesResource;
}
