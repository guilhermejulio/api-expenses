<?php

namespace App\Services\Financial;

use App\Dto\Financial\ExpenseDTO;
use App\Models\Financial\Expense;
use App\Repositories\Contracts\Financial\PersistExpenseInterface;

class PersistExpenseService
{
    private PersistExpenseInterface $persistRepository;

    public function __construct(PersistExpenseInterface $persistRepository)
    {
        $this->persistRepository = $persistRepository;
    }

    public function persist(ExpenseDTO $expenseDTO): void
    {
        try {
            $this->persistRepository->persistExpense($expenseDTO);
        } catch (\Exception $exception) {
        }
    }
}
