<?php

namespace App\Infrastructure\GraphQL\Workshop\Mutation;

use App\Domain\Workshop;

final class Create
{
    public function __invoke(array $arguments): Workshop
    {
        return new Workshop(
            $arguments['name'],
            $arguments['conference']
        );
    }
}
