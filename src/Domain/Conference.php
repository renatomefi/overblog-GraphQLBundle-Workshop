<?php
declare(strict_types=1);

namespace App\Domain;

use DateTimeImmutable;

final class Conference
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var DateTimeImmutable
     */
    private $dateStart;

    /**
     * @var DateTimeImmutable
     */
    private $dateEnd;

    public function __construct(string $name, DateTimeImmutable $dateStart, DateTimeImmutable $dateEnd)
    {
        $this->name = $name;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDateStart(): DateTimeImmutable
    {
        return $this->dateStart;
    }

    public function getDateEnd(): DateTimeImmutable
    {
        return $this->dateEnd;
    }
}
