<?php

namespace SharedKernel\Core\Services;

use SharedKernel\Core\Contracts\HydratorServiceInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;

class HydratorService implements HydratorServiceInterface
{

    public function hydrateObject(mixed $data, string $class)
    {
        return $this->hydrator()->denormalize($data, $class);
    }

    public function dehydrateObject($object)
    {
        return $this->hydrator()->normalize($object);
    }

    private function hydrator(): Serializer
    {
        return new Serializer(
            [
                new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter(), null, new ReflectionExtractor()),
                new DateTimeNormalizer(),
                new ArrayDenormalizer()
            ],
            [
                new JsonEncoder()
            ]
        );
    }
}
