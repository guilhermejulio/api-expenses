<?php

namespace Tests\Unit\Services\Financial;

use App\Dto\Financial\CreateExpenseDTO;
use App\Http\Resources\Financial\ExpenseResource;
use App\Models\User;
use App\Notifications\NewExpenseEmailNotification;
use App\Repositories\Contracts\Financial\PersistExpenseInterface;
use App\Services\Financial\PersistExpenseService;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Mockery;
use Tests\TestCase;

class PersistExpenseServiceTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testPersistExpense()
    {
        $user = Mockery::mock(Authenticatable::class);
        $user->shouldReceive('getAuthIdentifier')->andReturn(1);
        Auth::shouldReceive('user')->once()->andReturn($user);

        $repository = Mockery::mock(PersistExpenseInterface::class);

        $notification = Mockery::mock(NewExpenseEmailNotification::class);

        $expenseDTO = new CreateExpenseDTO();
        $expenseDTO->setDescription('Teste');
        $expenseDTO->setAmount(100);
        $expenseDTO->setFkUserId(1);
        $resource = new ExpenseResource([
            'id' => 1,
            'description' => 'Teste',
            'amount' => 100,
            'user_id' => 1,
        ]);

        $repository->shouldReceive('persistExpense')->once()->with($expenseDTO)->andReturn($resource);
        $service = new PersistExpenseService($repository);

        $this->app->instance(NewExpenseEmailNotification::class, $notification);
        $notification->shouldReceive('toMail')->andReturnSelf();
        $result = $service->persist($expenseDTO);
        $this->assertInstanceOf(ExpenseResource::class, $result);
    }
}
