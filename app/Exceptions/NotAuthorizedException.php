<?php

namespace App\Exceptions;

use Exception;

class NotAuthorizedException extends Exception
{
    protected $message = 'Email ou senha incorretos';
    protected $code = 401;
}
