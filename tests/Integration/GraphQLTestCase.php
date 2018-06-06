<?php
declare(strict_types=1);

namespace App\Tests\Integration;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

abstract class GraphQLTestCase extends WebTestCase
{
    public const GRAPHQL_ENDPOINT = '/';

    protected function runQueryFile(string $queryFile, string $jsonFile, array $variables = []): void
    {
        if (!is_file($queryFile)) {
            throw new \InvalidArgumentException("Didn't find the query file '$queryFile'.");
        }

        if (!is_file($jsonFile)) {
            throw new \InvalidArgumentException("Found a query file '$queryFile' but no matching json '$jsonFile'.");
        }

        $query = file_get_contents($queryFile);
        $expected = file_get_contents($jsonFile);

        $this->assertQuery($query, $expected, $variables);
    }

    private function assertQuery(string $query, string $jsonExpected, array $jsonVariables): void
    {
        /** @var \Symfony\Bundle\FrameworkBundle\Client $client */
        $client = static::createClient();
        $client->request(
            Request::METHOD_POST,
            self::GRAPHQL_ENDPOINT,
            [],
            [],
            [
                'CONTENT_TYPE' => 'application/json',
            ],
            json_encode(['query' => $query, 'variables' => $jsonVariables])
        );

        $result = $client->getResponse()->getContent();
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), $result);
        $this->assertEquals(json_decode($jsonExpected, true), json_decode($result, true), $result);
    }
}