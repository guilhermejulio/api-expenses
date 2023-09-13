<?php

namespace App\Services\Financial;

use App\Repositories\Contracts\Financial\DeleteExpenseInterface;

class DeleteExpenseService
{
    private DeleteExpenseInterface $deleteRepository;

    public function __construct(DeleteExpenseInterface $deleteRepository)
    {
        $this->deleteRepository = $deleteRepository;
    }

    public function delete(int $expenseId): void
    {
        $this->deleteRepository->deleteExpense($expenseId);
    }
}
