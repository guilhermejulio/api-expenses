<?php

namespace SharedKernel\Auth\Tymon;

use Tymon\JWTAuth\Facades\JWTAuth;

class JwtTymonAuth
{
    public function authenticateToken()
    {
        return JWTAuth::parseToken()->authenticate();
    }
}
