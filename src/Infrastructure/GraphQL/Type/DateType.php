<?php
declare(strict_types=1);

namespace App\Infrastructure\GraphQL\Type;

final class DateType
{
    public static function serialize(\DateTimeImmutable $value): string
    {
        return $value->format('Y-m-d');
    }

    public static function parseValue(string $value): \DateTimeImmutable
    {
        return new \DateTimeImmutable($value);
    }

    public static function parseLiteral(string $valueNode): \DateTimeImmutable
    {
        return new \DateTimeImmutable($valueNode->value);
    }
}
