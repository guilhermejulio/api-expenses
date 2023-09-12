<?php

namespace App\Policies;

use App\Exceptions\ExpenseNotOwnedException;
use App\Models\Financial\Expense;
use App\Models\User;

class ExpensePolicy
{
    public function update(User $user, Expense $expense): bool
    {
        return $this->isOwner($user, $expense);
    }

    private function isOwner(User $user, Expense $expense)
    {
        if ($user->id !== $expense->fk_user_id) {
            throw new ExpenseNotOwnedException();
        }

        return true;
    }
}
