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

    public function persistExpense(ExpenseDTO $expenseDTO): Expense
    {
        $data = json_decode(json_encode($expenseDTO), true);
        unset($data['id']);

        /** @var Expense */
        return $this->model->create($data);
    }
}
