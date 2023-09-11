<?php

namespace App\Repositories\Financial;

use App\Dto\Financial\ExpenseDTO;
use App\Models\Financial\Expense;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\Financial\PersistExpenseInterface;

class PersistExpenseRepository extends BaseRepository implements PersistExpenseInterface
{
    public function __construct(Expense $model)
    {
        parent::__construct($model);
    }

    public function persistExpense(ExpenseDTO $expenseDTO)
    {
        $data = [
            'description' => $expenseDTO->getDescription(),
            'date' => $expenseDTO->getDate(),
            'fk_user_id' => $expenseDTO->getUserId(),
            'amount' => $expenseDTO->getAmount(),
        ];

        $this->model->create($data);
    }
}
