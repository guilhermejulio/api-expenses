<?php

namespace Tests\Unit\Services\Financial;

use App\Dto\Financial\EditExpenseDTO;
use App\Http\Resources\Financial\ExpenseResource;
use App\Repositories\Contracts\Financial\EditExpenseInterface;
use App\Repositories\Contracts\Financial\RetrieveExpenseInterface;
use App\Services\Financial\EditExpenseService;
use PHPUnit\Framework\TestCase;

class EditExpenseServiceTest extends TestCase
{
    public function testEditExpense()
    {
        $editRepository = $this->createMock(EditExpenseInterface::class);
        $retrieveRepository = $this->createMock(RetrieveExpenseInterface::class);

        $expenseId = 123;
        $expenseDTO = new EditExpenseDTO();
        $expenseDTO->setDescription('Teste');
        $expenseDTO->setDate('2021-01-01');
        $expenseDTO->setAmount('100.00');

        $editedExpense = new ExpenseResource(
            [
                'id' => $expenseId,
                'description' => $expenseDTO->getDescription(),
                'date' => $expenseDTO->getDate(),
                'amount' => $expenseDTO->getAmount(),
            ]
        );

        $editRepository->expects($this->once())
            ->method('editExpense')
            ->with($this->equalTo($expenseId), $this->equalTo($expenseDTO))
            ->willReturn($editedExpense);

        $editService = new EditExpenseService($editRepository, $retrieveRepository);
        $result = $editService->edit($expenseId, $expenseDTO);
        $this->assertInstanceOf(ExpenseResource::class, $result);
    }
}
