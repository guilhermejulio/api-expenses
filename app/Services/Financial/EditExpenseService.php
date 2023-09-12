<?php

namespace App\Services\Financial;

use App\Dto\Financial\EditExpenseDTO;
use App\Http\Resources\Financial\ExpenseResource;
use App\Repositories\Contracts\Financial\EditExpenseInterface;
use App\Repositories\Contracts\Financial\RetrieveExpenseInterface;

class EditExpenseService
{
    private EditExpenseInterface $editRepository;
    private RetrieveExpenseInterface $retrieveRepository;

    public function __construct(EditExpenseInterface $editRepository,
                                RetrieveExpenseInterface $retrieveRepository,
    )
    {
        $this->editRepository = $editRepository;
        $this->retrieveRepository = $retrieveRepository;
    }

    public function edit(int $expenseId, EditExpenseDTO $expenseDTO): ExpenseResource
    {
        return $this->editRepository->editExpense($expenseId, $expenseDTO);
    }
}
