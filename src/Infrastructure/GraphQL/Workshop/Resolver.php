<?php

namespace App\Infrastructure\GraphQL\Workshop;

use App\Domain\Workshop;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

final class Resolver implements MutationInterface
{
    public function __invoke(array $arguments): Workshop
    {
        return $this->createWorkshop($arguments);
    }

    public function createWorkshop(array $arguments): Workshop
    {
        return Workshop::fromArray($arguments);
    }
}
