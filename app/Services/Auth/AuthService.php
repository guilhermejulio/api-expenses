<?php

namespace App\Services\Auth;

use App\Exceptions\NotAuthorizedException;
use App\Repositories\Contracts\User\CreateUserInterface;
use SharedKernel\Auth\LaravelAuth;

class AuthService
{
    protected LaravelAuth $auth;
    private CreateUserInterface $createUserRepository;

    public function __construct(LaravelAuth $auth, CreateUserInterface $createUserRepository)
    {
        $this->auth = $auth;
        $this->createUserRepository = $createUserRepository;
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

    public function register($name, $email, $password): AuthServiceResponse
    {
        $credentials = ['name' => $name, 'email' => $email, 'password' => bcrypt($password)];
        $this->createUserRepository->create($credentials);

        $response = $this->auth->attempt(['email' => $email, 'password' => $password]);
        if (!$response) {
            throw new NotAuthorizedException();
        }


        return $this->token($response);
    }

    public function logout(): void
    {
        $this->auth->logout();
    }
}
