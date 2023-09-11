<?php

namespace App\Repositories\Contracts\Financial;

interface RetrieveExpenseInterface
{
    public function getExpenses(int $userId);

    public function getExpensesPaginated(int $userId, int $page, int $perPage);
}
