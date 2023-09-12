<?php

namespace SharedKernel\Core\Contracts;

interface HydratorServiceInterface
{
    public function hydrateObject(mixed $data, string $class);

    public function dehydrateObject($object);
}
