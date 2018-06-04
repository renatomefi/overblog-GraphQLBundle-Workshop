<?php

namespace App\Domain;

final class Workshop
{
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
    }

    public function getConference(): string
    {
        return $this->conference;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
