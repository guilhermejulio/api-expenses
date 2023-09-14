<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Services\Auth\AuthService;
use SharedKernel\Core\Structures\HttpResponse;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(): HttpResponse
    {
        $response = $this->authService->auth(request('email', ''), request('password', ''));
        return new HttpResponse($response, HttpResponse::HTTP_OK);
    }

    public function register(CreateUserRequest $request): HttpResponse
    {
        $response = $this->authService->register(
            $request->get('name'),
            $request->get('email'),
            $request->get('password')
        );
        return new HttpResponse($response, Response::HTTP_CREATED);
    }

    public function logout(): HttpResponse
    {
        $this->authService->logout();
        return new HttpResponse(null, Response::HTTP_NO_CONTENT);
    }
}
