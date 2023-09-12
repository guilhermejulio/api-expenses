<?php

namespace App\Services\Auth;

use JsonSerializable;

class AuthServiceResponse implements JsonSerializable
{
    private string $token;
    private string $type;
    private string $expiresIn;

    public function __construct()
    {
        $this->token = '';
        $this->type = 'bearer';
        $this->expiresIn = '';
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getExpiresIn(): string
    {
        return $this->expiresIn;
    }

    public function setExpiresIn(string $expiresIn): void
    {
        $this->expiresIn = $expiresIn;
    }

    public function jsonSerialize(): mixed
    {
        return [
            'access_token' => $this->token,
            'token_type' => $this->type,
            'expires_in' => $this->expiresIn,
        ];
    }
}
