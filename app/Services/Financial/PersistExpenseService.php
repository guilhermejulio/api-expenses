<?php

namespace App\Services\Financial;

use App\Dto\Financial\ExpenseDTO;
use App\Http\Resources\Financial\ExpenseResource;
use App\Repositories\Contracts\Financial\PersistExpenseInterface;

class PersistExpenseService
{
    private PersistExpenseInterface $persistRepository;

    public function __construct(PersistExpenseInterface $persistRepository)
    {
        $this->persistRepository = $persistRepository;
    }

    public function persist(ExpenseDTO $expenseDTO): ExpenseResource
    {
        return $this->persistRepository->persistExpense($expenseDTO);
    }
}
