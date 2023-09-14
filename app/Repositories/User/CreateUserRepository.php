<?php

namespace App\Repositories\User;

use App\Http\Resources\User\UserResource;
use App\Models\User;
use App\Repositories\Contracts\User\CreateUserInterface;

class CreateUserRepository implements CreateUserInterface
{
    protected User $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(array $data): UserResource
    {
        $user = $this->model->create($data);
        return new UserResource($user);
    }
}
