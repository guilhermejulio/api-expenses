<?php

namespace Tests\Unit\Services\Financial;

use App\Models\Financial\Expense;
use App\Repositories\Contracts\Financial\DeleteExpenseInterface;
use App\Services\Financial\DeleteExpenseService;
use PHPUnit\Framework\TestCase;

class DeleteExpenseServiceTest extends TestCase
{
    public function testDeleteExpense()
    {
        $deleteRepository = $this->createMock(DeleteExpenseInterface::class);
        $expenseId = 123;
        $deleteRepository->expects($this->once())
            ->method('deleteExpense')
            ->with($this->equalTo($expenseId));
        $deleteService = new DeleteExpenseService($deleteRepository);
        $deleteService->delete($expenseId);
    }
}





