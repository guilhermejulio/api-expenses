<?php

namespace App\Http\Controllers\Api\Financial;

use App\Dto\Financial\EditExpenseDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Financial\EditExpenseRequest;
use App\Models\Financial\Expense;
use App\Services\Financial\EditExpenseService;
use SharedKernel\Core\Services\HydratorService;
use SharedKernel\Core\Structures\HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class EditExpenseController extends Controller
{
    private EditExpenseService $editExpenseService;
    private HydratorService $hydratorService;

    public function __construct(
        EditExpenseService $editExpenseService,
        HydratorService $hydratorService
    ) {
        $this->editExpenseService = $editExpenseService;
        $this->hydratorService = $hydratorService;
    }

    public function update(EditExpenseRequest $request, Expense $expense)
    {
        $this->authorize('update', $expense);
        $serviceRequest = $this->prepareRequest($request);
        $response = $this->editExpenseService->edit($expense->id, $serviceRequest);
        return new HttpResponse($response, Response::HTTP_OK, [], 'expense');
    }

    private function prepareRequest(EditExpenseRequest $request)
    {
        $data = $request->toArray();
        return $this->hydratorService->hydrateObject($data, EditExpenseDTO::class);
    }
}
