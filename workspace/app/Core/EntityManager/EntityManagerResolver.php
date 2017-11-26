<?php
declare(strict_types=1);

namespace Core\EntityManager;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Common\Persistence\ObjectManager;


class EntityManagerResolver
{
    /**
     * @var ManagerRegistry
     */
    private $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    /**
     * @param object|string $entity
     * @return ObjectManager
     */
    public function getEntityManager($entity): ObjectManager
    {
        if (is_object($entity)) {
            $entity = \get_class($entity);
        }

        $em = $this->managerRegistry->getManagerForClass($entity);
        if (! $em) {
            throw new \RuntimeException(sprintf('Entity manager for class <%s> not found', $entity));
        }

        return $em;
    }
}