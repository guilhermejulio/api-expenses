<?php

namespace App\Exceptions;

use Exception;

class NotAuthenticatedException extends Exception
{
    protected $message = 'Usuário não autenticado';
    protected $code = 401;
}
