<?php

namespace App\Http\Controllers\Api\Financial;

use App\Http\Controllers\Controller;
use App\Models\Financial\Expense;
use App\Services\Financial\DeleteExpenseService;
use SharedKernel\Core\Structures\HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class DeleteExpenseController extends Controller
{
    private DeleteExpenseService $deleteExpenseService;

    public function __construct(DeleteExpenseService $deleteExpenseService)
    {
        $this->deleteExpenseService = $deleteExpenseService;
    }

    public function delete(Expense $expense): HttpResponse
    {
        $this->authorize('delete', $expense);
        $this->deleteExpenseService->delete($expense->id);
        return new HttpResponse(null, Response::HTTP_NO_CONTENT);
    }
}
