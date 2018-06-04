<?php

namespace App\Infrastructure\GraphQL\Workshop\Mutation;

use App\Domain\Workshop;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

final class Create implements MutationInterface
{
    public function __invoke(array $arguments): Workshop
    {
        return new Workshop(
            $arguments['name'],
            $arguments['conference']
        );
    }
}
