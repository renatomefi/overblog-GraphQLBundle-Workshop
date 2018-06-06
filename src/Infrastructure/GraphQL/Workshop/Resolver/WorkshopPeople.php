<?php
declare(strict_types=1);

namespace App\Infrastructure\GraphQL\Workshop\Resolver;

use App\Domain\Person;
use App\Domain\Repository\PersonRepositoryInterface;
use App\Domain\Workshop;
use Generator;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

final class WorkshopPeople implements ResolverInterface, AliasedInterface
{
    public const ENROLLMENT_TYPE_TUTOR = 'tutor';

    public const ENROLLMENT_TYPE_ATTENDEE = 'attendee';

    private $data = [
        '5cf8c6ac-7f40-46a1-b666-2c262d4e8abe' => [
            '3317742c-1dec-43d1-b1eb-06634a58e95b' => self::ENROLLMENT_TYPE_TUTOR,
            'd186ebf4-9de1-4eb6-b5ab-fbc07f7ca1d6' => self::ENROLLMENT_TYPE_ATTENDEE,
            '83799804-5236-4c74-bab9-faf59c084f4a' => self::ENROLLMENT_TYPE_ATTENDEE,
            '1e38f9b9-e567-473f-9151-0f711263c0c8' => self::ENROLLMENT_TYPE_ATTENDEE,
            '0240850e-2494-46de-a428-b3fb8b3ee35c' => self::ENROLLMENT_TYPE_ATTENDEE,
        ],
        'aab5088d-6b59-4e00-84b8-3e71943fd2a1' => [
            '9099d144-fc0b-417c-a003-eb9396a3e264' => self::ENROLLMENT_TYPE_TUTOR,
        ]
    ];

    /**
     * @var PersonRepositoryInterface
     */
    private $personRepository;

    public function __construct(PersonRepositoryInterface $personRepository)
    {
        $this->personRepository = $personRepository;
    }

    /**
     * @return Person[]
     */
    public function resolvePeopleByWorkshop(Workshop $workshop, Argument $args): Generator
    {
        $peopleIds = $this->data[$workshop->getId()];

        foreach ($peopleIds as $personId => $role) {
            yield $this->personRepository->findById($personId);
        }
    }

    public static function getAliases(): array
    {
        return [
            'resolvePeopleByWorkshop' => 'app.graphql.resolver.people.by.workshop',
        ];
    }
}
