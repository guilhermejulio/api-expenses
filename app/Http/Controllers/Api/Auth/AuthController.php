<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\AuthService;
use SharedKernel\Core\Structures\HttpResponse;

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
}
