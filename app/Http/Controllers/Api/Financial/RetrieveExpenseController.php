<?php

namespace App\Http\Controllers\Api\Financial;

use App\Http\Controllers\Controller;
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

    public function get()
    {
        $response = $this->retrieveExpenseService->retrieveExpensesFromUser(Auth::user()->id);
        return new HttpResponse($response, Response::HTTP_OK, [], 'expenses');
    }
}
