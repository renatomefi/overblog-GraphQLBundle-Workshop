<?php
declare(strict_types=1);

namespace App\Tests\Integration\GraphQL;

use App\Tests\Integration\GraphQLTestCase;

final class PersonTest extends GraphQLTestCase
{
    public function testCanRetrieveAPerson(): void
    {
        $this->runQueryFile(
            __DIR__ . '/Fixtures/PersonSingle.graphql',
            __DIR__ . '/Fixtures/PersonSingle.json'
        );
    }

    public function testCanRetrievePeople(): void
    {
        $this->markTestSkipped('Too much info');
        $this->runQueryFile(
            __DIR__ . '/Fixtures/PersonAllPeople.graphql',
            __DIR__ . '/Fixtures/PersonAllPeople.json'
        );
    }
}
