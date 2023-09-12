<?php

namespace App\Http\Controllers\Api\Financial;

use App\Dto\Financial\CreateExpenseDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Financial\CreateExpenseRequest;
use App\Services\Financial\PersistExpenseService;
use Illuminate\Support\Facades\Auth;
use SharedKernel\Core\Services\HydratorService;
use SharedKernel\Core\Structures\HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class CreateExpenseController extends Controller
{
    private PersistExpenseService $persistExpenseService;
    private HydratorService $hydratorService;

    public function __construct(
        PersistExpenseService $persistExpenseService,
        HydratorService $hydratorService
    ) {
        $this->persistExpenseService = $persistExpenseService;
        $this->hydratorService = $hydratorService;
    }

    public function post(CreateExpenseRequest $request): HttpResponse
    {
        $serviceRequest = $this->prepareRequest($request);
        try {
            $response = $this->persistExpenseService->persist($serviceRequest);
            return new HttpResponse($response, Response::HTTP_CREATED, [], 'expense');
        } catch (\Exception $e) {
            return new HttpResponse($e->getMessage(), $e->getCode());
        }
    }

    public function prepareRequest(CreateExpenseRequest $request): CreateExpenseDTO
    {
        $data = $request->toArray();
        $data['fk_user_id'] = Auth::user()->id;
        return $this->hydratorService->hydrateObject($data, CreateExpenseDTO::class);
    }
}
