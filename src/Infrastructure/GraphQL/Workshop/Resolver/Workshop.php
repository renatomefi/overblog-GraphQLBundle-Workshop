<?php
declare(strict_types=1);

namespace App\Infrastructure\GraphQL\Workshop\Resolver;

use App\Domain\Repository\WorkshopRepositoryInterface;
use App\Domain\Workshop as WorkshopVo;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;
use Overblog\GraphQLBundle\Relay\Connection\Output\Connection;
use Overblog\GraphQLBundle\Relay\Connection\Output\ConnectionBuilder;

final class Workshop implements ResolverInterface, AliasedInterface
{
    /**
     * @var WorkshopRepositoryInterface
     */
    private $workshopRepository;

    public function __construct(WorkshopRepositoryInterface $workshopRepository)
    {
        $this->workshopRepository = $workshopRepository;
    }

    public function allWorkshops(): array
    {
        return $this->workshopRepository->findAll();
    }

    public function relayWorkshops($args): Connection
    {
        $data = $this->allWorkshops();

        $count = \count($data);
//
//        $beforeOffset = ConnectionBuilder::getOffsetWithDefault($args['before'], $count);
//        $afterOffset = ConnectionBuilder::getOffsetWithDefault($args['after'], -1);
//        $startOffset = max($afterOffset, -1) + 1;
//        $endOffset = min($beforeOffset, $count);
//        if (is_numeric($args['first'])) {
//            $endOffset = min($endOffset, $startOffset + $args['first']);
//        }
//        if (is_numeric($args['last'])) {
//            $startOffset = max($startOffset, $endOffset - $args['last']);
//        }
//        $offset = max($startOffset, 0);

        return ConnectionBuilder::connectionFromArraySlice(
            $data,
            $args,
            [
//                'sliceStart' => $offset,
                'arrayLength' => $count,
            ]
        );
    }

    public function workshopById(string $id): ?WorkshopVo
    {
        return $this->workshopRepository->findById($id);
    }

    public static function getAliases(): array
    {
        return [
            'allWorkshops' => 'app.graphql.resolver.workshop.all',
            'relayWorkshops' => 'app.graphql.resolver.workshop.relay',
            'workshopById' => 'app.graphql.resolver.workshop.by.id',
        ];
    }
}
