<?php

namespace App\Services\Financial;

use App\Dto\Financial\CreateExpenseDTO;
use App\Http\Resources\Financial\ExpenseResource;
use App\Notifications\NewExpenseEmailNotification;
use App\Repositories\Contracts\Financial\PersistExpenseInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PersistExpenseService
{
    private PersistExpenseInterface $persistRepository;

    public function __construct(PersistExpenseInterface $persistRepository)
    {
        $this->persistRepository = $persistRepository;
    }

    public function persist(CreateExpenseDTO $expenseDTO): ExpenseResource
    {
        $resource = $this->persistRepository->persistExpense($expenseDTO);
        try {
            $this->sendNotification($expenseDTO->getDescription(), $expenseDTO->getAmount());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

        return new ExpenseResource($resource);
    }

    private function sendNotification(string $description, string $amount): void
    {
        $user = Auth::user();
        $user->description = $description;
        $user->amount = $amount;
        $user->notify((new NewExpenseEmailNotification())->onQueue('email'));
    }
}
