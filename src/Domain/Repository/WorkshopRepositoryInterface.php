<?php
declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Workshop;

interface WorkshopRepositoryInterface extends RepositoryInterface
{
    /**
     * @return Workshop[]
     */
    public function findAll(): array;

    public function findById(string $id): ?Workshop;
}
