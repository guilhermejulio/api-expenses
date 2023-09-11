<?php

namespace App\Repositories;


use App\Models\BaseModel;

abstract class BaseRepository
{
    protected BaseModel $model;

    public function __construct(BaseModel $model)
    {
        $this->model = $model;
    }
}
