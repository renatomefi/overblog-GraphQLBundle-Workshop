<?php
declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Conference;
use App\Domain\Repository\WorkshopRepositoryInterface;
use App\Domain\Workshop;

final class WorkshopRepository implements WorkshopRepositoryInterface
{
    /**
     * @var Workshop[]
     */
    private $data;

    public function __construct()
    {
        $phpCE = new Conference(
            'PHPCE  2018',
            new \DateTimeImmutable('2018-10-26'),
            new \DateTimeImmutable('2018-10-28')
        );

        $this->data = [
            '5cf8c6ac-7f40-46a1-b666-2c262d4e8abe' => new Workshop('GraphQL Server in PHP with Symfony Flex', $phpCE, '5cf8c6ac-7f40-46a1-b666-2c262d4e8abe'),
            'aab5088d-6b59-4e00-84b8-3e71943fd2a1' => new Workshop('Getting started with Symfony 4 and Flex', $phpCE, 'aab5088d-6b59-4e00-84b8-3e71943fd2a1'),
        ];
    }

    public function findAll(): array
    {
        return array_values($this->data);
    }

    public function findById(string $id): ?Workshop
    {
        return $this->data[$id] ?? null;
    }
}
