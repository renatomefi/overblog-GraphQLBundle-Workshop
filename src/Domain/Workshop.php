<?php

namespace App\Domain;

use Ramsey\Uuid\Uuid;

final class Workshop
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $conference;

    /**
     * @var string
     */
    private $name;

    public function __construct(string $name, string $conference)
    {
        $this->name = $name;
        $this->conference = $conference;
        $this->id = Uuid::uuid4();
    }

    public function getConference(): string
    {
        return $this->conference;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getId(): ?string
    {
        return $this->id;
    }
}
