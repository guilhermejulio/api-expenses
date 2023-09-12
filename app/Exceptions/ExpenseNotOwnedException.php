<?php

namespace App\Exceptions;

use Exception;

class ExpenseNotOwnedException extends Exception
{
    protected $message = 'Despesa não pertence ao usuário';
    protected $code = 403;
}
