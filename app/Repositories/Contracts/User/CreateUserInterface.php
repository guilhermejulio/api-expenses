<?php

namespace App\Repositories\Contracts\User;

use App\Http\Resources\User\UserResource;

interface CreateUserInterface
{
    public function create(array $data): UserResource;
}
