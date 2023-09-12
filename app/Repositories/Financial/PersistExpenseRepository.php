<?php

namespace App\Repositories\Financial;

use App\Dto\Financial\CreateExpenseDTO;
use App\Http\Resources\Financial\ExpenseResource;
use App\Models\Financial\Expense;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\Financial\PersistExpenseInterface;

class PersistExpenseRepository extends BaseRepository implements PersistExpenseInterface
{
    public function __construct(Expense $model)
    {
        parent::__construct($model);
    }

    public function persistExpense(CreateExpenseDTO $expenseDTO): ExpenseResource
    {
        $data = json_decode(json_encode($expenseDTO), true);
        $expense = $this->model->create($data);
        return new ExpenseResource($expense);
    }
}
