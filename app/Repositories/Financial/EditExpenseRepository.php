<?php

namespace App\Repositories\Financial;

use App\Dto\Financial\EditExpenseDTO;
use App\Http\Resources\Financial\ExpenseResource;
use App\Models\Financial\Expense;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\Financial\EditExpenseInterface;

class EditExpenseRepository extends BaseRepository implements EditExpenseInterface
{
    public function __construct(Expense $model)
    {
        parent::__construct($model);
    }

    public function editExpense(int $expenseId, EditExpenseDTO $expenseDTO): ExpenseResource
    {
        $data = json_decode(json_encode($expenseDTO), true);
        $expense = $this->model->find($expenseId);
        $expense->update($data);
        return new ExpenseResource($expense);
    }
}
