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

    private function __construct(string $name, string $conference)
    {
        $this->name = $name;
        $this->conference = $conference;
    }

    public static function fromArray(array $arguments): self
    {
        return new self(
            $arguments['name'],
            $arguments['conference']
        );
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
