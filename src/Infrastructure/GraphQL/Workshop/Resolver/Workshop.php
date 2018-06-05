<?php

namespace App\Infrastructure\GraphQL\Workshop\Resolver;

use App\Domain\Workshop as WorkshopVo;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
use Overblog\GraphQLBundle\Relay\Connection\Output\Connection;
use Overblog\GraphQLBundle\Relay\Connection\Output\ConnectionBuilder;

final class Workshop implements ResolverInterface, AliasedInterface
{
    public function allWorkshops(): array
    {
        return [
            new WorkshopVo('GraphQL with Symfony', 'DPC 2018', '5cf8c6ac-7f40-46a1-b666-2c262d4e8abe'),
            new WorkshopVo('GraphQL with Symfony', 'FWDays 2018', 'aab5088d-6b59-4e00-84b8-3e71943fd2a1'),
        ];
    }

    public function relayWorkshops($args): Connection
    {
        $data = $this->allWorkshops();

        return ConnectionBuilder::connectionFromArraySlice(
            $data,
            $args,
            [
                'arrayLength' => \count($data),
            ]
        );
    }

    public function workshopById(string $id): ?WorkshopVo
    {
        return array_filter($this->allWorkshops(), function (WorkshopVo $workshop) use ($id) {
            return $workshop->getId() === $id;
        })[0] ?? null;
    }

    public static function getAliases(): array
    {
        return [
            'allWorkshops' => 'app.graphql.resolver.workshop.all',
            'relayWorkshops' => 'app.graphql.resolver.workshop.relay',
            'workshopById' => 'app.graphql.resolver.workshop.by.id',
        ];
    }
}
