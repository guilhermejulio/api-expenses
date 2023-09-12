<?php

namespace SharedKernel\Core\Services;

class SessionIdentifierService
{
    public function getRequestHash(): string
    {
        return md5(request()->getUri());
    }
    public function getSessionHash(): string
    {
        return md5(request()->bearerToken());
    }
}
