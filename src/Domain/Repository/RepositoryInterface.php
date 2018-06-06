<?php
declare(strict_types=1);

namespace App\Domain\Repository;

interface RepositoryInterface
{
    public function findAll(): array;

    public function findById(string $id);
}
