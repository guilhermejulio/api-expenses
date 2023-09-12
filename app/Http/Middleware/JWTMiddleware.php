<?php

namespace App\Http\Middleware;

use App\Exceptions\NotAuthenticatedException;
use App\Exceptions\NotAuthorizedException;
use Closure;
use Exception;
use Illuminate\Http\Request;
use SharedKernel\Auth\Tymon\JwtTymonAuth;
use Symfony\Component\HttpFoundation\Response;

class JWTMiddleware
{
    protected JwtTymonAuth $jwtAuth;

    public function __construct(JwtTymonAuth $jwtAuth)
    {
        $this->jwtAuth = $jwtAuth;
    }

    public function handle(Request $request, Closure $next): Response
    {
        try {
            config(['auth.defaults.guard' => 'api']);
            $user = $this->jwtAuth->authenticateToken();
            if (!$user) {
                throw new NotAuthenticatedException();
            }
        } catch (Exception $e) {
            throw new NotAuthenticatedException();
        }
        return $next($request);
    }
}
