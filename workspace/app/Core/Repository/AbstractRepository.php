<?php
declare(strict_types=1);

namespace Core\Repository;


use Core\Exception\ModelNotFoundException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Repository\DefaultRepositoryFactory;

abstract class AbstractRepository
{
    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $entityRepository;

    public function __construct(EntityManager $entityManager, DefaultRepositoryFactory $defaultRepositoryFactory)
    {
        $this->entityRepository = $defaultRepositoryFactory->getRepository($entityManager, $this->getEntity());
    }


    abstract protected function getEntity(): string;


    public function find($id, $lockMode = null, $lockVersion = null)
    {
        return $this->entityRepository->find($id, $lockMode, $lockVersion);
    }

    /**
     * Finds all entities in the repository.
     *
     * @return array The entities.
     */
    public function findAll()
    {
        return $this->entityRepository->findAll();
    }

    /**
     * @param mixed $id
     * @return object The entity instance
     * @throws ModelNotFoundException
     */
    public function get($id, $lockMode = null, $lockVersion = null)
    {
        $entity = $this->find($id, $lockMode, $lockVersion);
        if (! $entity) {
            throw ModelNotFoundException::forClassId($this->getEntity(), $id);
        }

        return $entity;
    }
}