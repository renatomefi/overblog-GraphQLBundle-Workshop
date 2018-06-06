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
            '9099d144-fc0b-417c-a003-eb9396a3e264' => new Person('Denis Brumann', new DateTimeImmutable(), '9099d144-fc0b-417c-a003-eb9396a3e264'),
            'd186ebf4-9de1-4eb6-b5ab-fbc07f7ca1d6' => new Person('Koen Eelen', new DateTimeImmutable(), 'd186ebf4-9de1-4eb6-b5ab-fbc07f7ca1d6'),
            'b7b5c83b-3e20-421d-8351-03eb4bc1eeff' => new Person('Pavel Abduramanov', new DateTimeImmutable(), 'b7b5c83b-3e20-421d-8351-03eb4bc1eeff'),
            '83799804-5236-4c74-bab9-faf59c084f4a' => new Person('Donatas Aleksandravičius', new DateTimeImmutable(), '83799804-5236-4c74-bab9-faf59c084f4a'),
            '3c3c8804-e3cd-4025-af15-bf62dfb22f38' => new Person('Tjeerd Bijlsma', new DateTimeImmutable(), '3c3c8804-e3cd-4025-af15-bf62dfb22f38'),
            '1e38f9b9-e567-473f-9151-0f711263c0c8' => new Person('Jakob Buis', new DateTimeImmutable(), '1e38f9b9-e567-473f-9151-0f711263c0c8'),
            'a9236c37-6db8-4002-919c-036faaf24b07' => new Person('Peter Ton', new DateTimeImmutable(), 'a9236c37-6db8-4002-919c-036faaf24b07'),
            '88e0318f-17e0-4859-9766-a616f29bf364' => new Person('Martijn Letter', new DateTimeImmutable(), '88e0318f-17e0-4859-9766-a616f29bf364'),
            '0240850e-2494-46de-a428-b3fb8b3ee35c' => new Person('Sander Bol', new DateTimeImmutable(), '0240850e-2494-46de-a428-b3fb8b3ee35c'),
            '76ab071a-94d9-491b-9baf-96c6a485dc9f' => new Person('Onno Lissenberg', new DateTimeImmutable(), '76ab071a-94d9-491b-9baf-96c6a485dc9f'),
            '7b6b9b41-76cc-4774-ac74-eddc62b621a1' => new Person('Simon Gerritsen', new DateTimeImmutable(), '7b6b9b41-76cc-4774-ac74-eddc62b621a1'),
            '0bb74483-c6f3-4a8d-b23b-68e38081374e' => new Person('Karin Van den Berg', new DateTimeImmutable(), '0bb74483-c6f3-4a8d-b23b-68e38081374e'),
            '83eaf203-f2e3-4a32-b307-3e8e0f80149e' => new Person('Marina Orlova', new DateTimeImmutable(), '83eaf203-f2e3-4a32-b307-3e8e0f80149e'),
            'e50e55e0-1d00-451d-9392-40ab36667c57' => new Person('Henne Van Och', new DateTimeImmutable(), 'e50e55e0-1d00-451d-9392-40ab36667c57'),
            '89c64616-9f9c-47dd-9148-543bbb4db7b2' => new Person('Nikolay Naumenko', new DateTimeImmutable(), '89c64616-9f9c-47dd-9148-543bbb4db7b2'),
            '0fb827bf-09bc-4f0d-801f-35444e4d99fc' => new Person('Holger Woltersdorf', new DateTimeImmutable(), '0fb827bf-09bc-4f0d-801f-35444e4d99fc'),
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
