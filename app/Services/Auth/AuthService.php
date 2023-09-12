<?php

namespace App\Services\Auth;

use App\Exceptions\NotAuthorizedException;
use SharedKernel\Auth\LaravelAuth;

class AuthService
{
    protected LaravelAuth $auth;

    public function __construct(LaravelAuth $auth)
    {
        $this->auth = $auth;
    }

    public function auth(string $email, string $password): AuthServiceResponse
    {
        $credentials = ['email' => $email, 'password' => $password];
        $response = $this->auth->attempt($credentials);
        if (!$response) {
            throw new NotAuthorizedException();
        }

        return $this->token($response);
    }

    private function token($response)
    {
        $token = new AuthServiceResponse();
        $token->setToken($response);
        $token->setExpiresIn($this->auth->getTokenExpires());

        return $token;
    }
}
