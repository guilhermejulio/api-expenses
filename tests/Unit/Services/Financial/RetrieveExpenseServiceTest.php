<?php

namespace Tests\Unit\Services\Financial;

use App\Http\Resources\Financial\ExpenseResource;
use App\Http\Resources\Financial\UserExpensesResource;
use App\Repositories\Contracts\Financial\RetrieveExpenseInterface;
use App\Services\Financial\RetrieveExpenseService;
use Illuminate\Support\Facades\Auth;
use Mockery;
use Tests\TestCase;

class RetrieveExpenseServiceTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testRetrieveExpensesFromUser()
    {
        $userId = 1;
        Auth::shouldReceive('id')->andReturn($userId);
        $repository = Mockery::mock(RetrieveExpenseInterface::class);
        $userExpenses = new UserExpensesResource(
            [
                'data' => [
                    new ExpenseResource([
                        'id' => 1,
                        'description' => 'Teste',
                        'amount' => 100,
                        'user_id' => 1,
                    ]),
                    new ExpenseResource([
                        'id' => 2,
                        'description' => 'Teste 2',
                        'amount' => 200,
                        'user_id' => 1,
                    ]),
                ],
            ]
        );
        $repository->shouldReceive('retrieveExpensesFromUser')->with($userId)->andReturn($userExpenses);

        $service = new RetrieveExpenseService($repository);
        $result = $service->retrieveExpensesFromUser($userId);

        $this->assertInstanceOf(UserExpensesResource::class, $result);
    }

    public function testGetByID()
    {
        $repository = Mockery::mock(RetrieveExpenseInterface::class);

        // Configure o retorno esperado para o método getByID
        $expenseId = 123;
        $expense = new ExpenseResource(
            [
                'id' => $expenseId,
                'description' => 'Teste',
                'amount' => 100,
                'user_id' => 1,
            ]
        );
        $repository->shouldReceive('getByID')->once()->with($expenseId)->andReturn($expense);

        $service = new RetrieveExpenseService($repository);

        $result = $service->getByID($expenseId);
        $this->assertInstanceOf(ExpenseResource::class, $result);
    }
}
