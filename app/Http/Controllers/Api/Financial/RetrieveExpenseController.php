<?php

namespace App\Http\Controllers\Api\Financial;

use App\Http\Controllers\Controller;
use App\Models\Financial\Expense;
use App\Services\Financial\RetrieveExpenseService;
use Illuminate\Support\Facades\Auth;
use SharedKernel\Core\Structures\HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class RetrieveExpenseController extends Controller
{
    private RetrieveExpenseService $retrieveExpenseService;

    public function __construct(RetrieveExpenseService $retrieveExpenseService)
    {
        $this->retrieveExpenseService = $retrieveExpenseService;
    }

    public function list()
    {
        $response = $this->retrieveExpenseService->retrieveExpensesFromUser(Auth::user()->id);
        return new HttpResponse($response, Response::HTTP_OK, [], 'expenses');
    }

    public function get(Expense $expense)
    {
        $this->authorize('get', $expense);
        $response = $this->retrieveExpenseService->getByID($expense->id);
        return new HttpResponse($response, Response::HTTP_OK, [], 'expense');
    }
}
