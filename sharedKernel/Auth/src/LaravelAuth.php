<?php

namespace SharedKernel\Auth;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class LaravelAuth
{
    public function attempt($credentials, $guard = 'api'): bool|string
    {
        return Auth::guard($guard)->attempt($credentials);
    }

    public function user($guard = 'api'): ?Authenticatable
    {
        return Auth::guard($guard)->user();
    }

    public function getTokenExpires()
    {
        return 3600;
    }

    public function logout($guard = 'api'): void
    {
        Auth::guard($guard)->logout();
    }
}
