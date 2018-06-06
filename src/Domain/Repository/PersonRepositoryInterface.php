<?php
declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Person;

interface PersonRepositoryInterface extends RepositoryInterface
{
    /**
     * @return Person[]
     */
    public function findAll(): array;

    public function findById(string $id): ?Person;
}
