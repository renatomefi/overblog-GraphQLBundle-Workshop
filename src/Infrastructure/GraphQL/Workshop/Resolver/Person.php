<?php
declare(strict_types=1);

namespace App\Infrastructure\GraphQL\Workshop\Resolver;

use App\Domain\Person as PersonVo;
use App\Domain\Repository\PersonRepositoryInterface;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

final class Person implements ResolverInterface, AliasedInterface
{
    /**
     * @var PersonRepositoryInterface
     */
    private $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    public function allPersons(): array
    {
        return $this->personRepository->findAll();
    }

    public function personById(string $id): ?PersonVo
    {
        return $this->personRepository->findById($id);
    }

    public static function getAliases(): array
    {
        return [
            'allPersons' => 'app.graphql.resolver.person.all',
            'personById' => 'app.graphql.resolver.person.by.id',
        ];
    }
}
