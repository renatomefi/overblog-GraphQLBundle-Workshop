<?php
declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Person;
use App\Domain\Repository\PersonRepositoryInterface;
use DateTimeImmutable;

final class PersonRepository implements PersonRepositoryInterface
{
    /**
     * @var Person[]
     */
    private $data;

    public function __construct()
    {
        $this->data = [
            '3317742c-1dec-43d1-b1eb-06634a58e95b' => new Person('Renato Mefi', new DateTimeImmutable('1989-08-02'), '3317742c-1dec-43d1-b1eb-06634a58e95b'),
            '9099d144-fc0b-417c-a003-eb9396a3e264' => new Person('Person B', new DateTimeImmutable(), '9099d144-fc0b-417c-a003-eb9396a3e264'),
            'd186ebf4-9de1-4eb6-b5ab-fbc07f7ca1d6' => new Person('Person C', new DateTimeImmutable(), 'd186ebf4-9de1-4eb6-b5ab-fbc07f7ca1d6'),
            'b7b5c83b-3e20-421d-8351-03eb4bc1eeff' => new Person('Person D', new DateTimeImmutable(), 'b7b5c83b-3e20-421d-8351-03eb4bc1eeff'),
            '83799804-5236-4c74-bab9-faf59c084f4a' => new Person('Person E', new DateTimeImmutable(), '83799804-5236-4c74-bab9-faf59c084f4a'),
        ];
    }

    public function findAll(): array
    {
        return array_values($this->data);
    }

    public function findById(string $id): ?Person
    {
        return $this->data[$id] ?? null;
    }
}
