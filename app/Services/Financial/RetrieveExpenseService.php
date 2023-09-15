<?php

namespace App\Services\Financial;

use App\Http\Resources\Financial\ExpenseResource;
use App\Http\Resources\Financial\UserExpensesResource;
use App\Repositories\Contracts\Financial\RetrieveExpenseInterface;

class RetrieveExpenseService
{
    private RetrieveExpenseInterface $retrieveExpenseRepository;

    public function __construct(RetrieveExpenseInterface $retrieveExpenseRepository)
    {
        $this->retrieveExpenseRepository = $retrieveExpenseRepository;
    }

    public function retrieveExpensesFromUser(int $userId): UserExpensesResource
    {
        return $this->retrieveExpenseRepository->retrieveExpensesFromUser($userId);
    }

    public function getByID(int $expenseId): ExpenseResource
    {
        return $this->retrieveExpenseRepository->getByID($expenseId);
    }
}
