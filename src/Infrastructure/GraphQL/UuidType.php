<?php

namespace App\Infrastructure\GraphQL;

use GraphQL\Language\AST\StringValueNode;
use GraphQL\Type\Definition\ScalarType;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Ramsey\Uuid\Uuid;

final class UuidType extends ScalarType implements AliasedInterface
{
    private const NAME = 'UUID';

    public function __construct()
    {
        parent::__construct([
            'name' => self::NAME,
            'description' => 'A UUID represented as string'
        ]);
    }

    public function serialize($value): ?string
    {
        return \is_string($value) && Uuid::isValid($value) ? $value : null;
    }

    public function parseValue($value): ?string
    {
        return \is_string($value) && Uuid::isValid($value) ? $value : null;
    }

    public function parseLiteral($valueAST): ?string
    {
        if (!$valueAST instanceof StringValueNode) {
            return null;
        }

        return $this->parseValue($valueAST->value);
    }

    public static function getAliases(): array
    {
        return [self::NAME];
    }
}
