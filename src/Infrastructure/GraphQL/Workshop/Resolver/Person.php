<?php
declare(strict_types=1);

namespace App\Infrastructure\GraphQL\Workshop\Resolver;

use App\Domain\Person as PersonVo;
use DateTimeImmutable;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

final class Person implements ResolverInterface, AliasedInterface
{
    public function allPersons(): array
    {
        return [
            new PersonVo('Renato', new DateTimeImmutable('1989-08-02'), '3317742c-1dec-43d1-b1eb-06634a58e95b'),
            new PersonVo('René', new DateTimeImmutable('1992-12-31'), '9099d144-fc0b-417c-a003-eb9396a3e264'),
        ];
    }

    public function personById(string $id): ?PersonVo
    {
        return array_filter($this->allPersons(), function (PersonVo $person) use ($id) {
            return $person->getId() === $id;
        })[0] ?? null;
    }

    public static function getAliases(): array
    {
        return [
            'allPersons' => 'app.graphql.resolver.person.all',
            'personById' => 'app.graphql.resolver.person.by.id',
        ];
    }
}
