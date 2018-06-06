<?php
declare(strict_types=1);

namespace App\Domain;

use DateTimeImmutable;
use Ramsey\Uuid\Uuid;

final class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var DateTimeImmutable
     */
    private $bornDate;

    /**
     * @var null|string
     */
    private $id;

    public function __construct(string $name, DateTimeImmutable $bornDate, ?string $id = null)
    {
        $this->name = $name;
        $this->bornDate = $bornDate;
        $this->id = Uuid::isValid($id) ? $id : Uuid::uuid4();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBornDate(): DateTimeImmutable
    {
        return $this->bornDate;
    }

    public function getId(): ?string
    {
        return $this->id;
    }
}
