<?php
declare(strict_types=1);

namespace Domain\Merchants\Service;

use Domain\Merchants\Entity\Merchant;
use Domain\Merchants\Interfaces\MerchantInterface;
use Domain\Merchants\Repository\MerchantRepository;
use Infrastructure\EntityManager\EntityManagerResolver;
use Infrastructure\Exception\ModelNotFoundException;

class MerchantService
{
    /**
     * @var EntityManagerResolver
     */
    private $emResolver;

    /**
     * @var MerchantRepository
     */
    private $merchantRepository;

    public function __construct(EntityManagerResolver $emResolver, MerchantRepository $merchantRepository)
    {
        $this->emResolver = $emResolver;
        $this->merchantRepository = $merchantRepository;
    }

    /**
     * @param int $id
     * @return MerchantInterface|object
     * @throws ModelNotFoundException
     */
    public function getMerchantById(int $id): MerchantInterface
    {
        return $this->merchantRepository->get($id);
    }

    /**
     * @return MerchantInterface[]|object[]
     */
    public function getAllMerchants(): array
    {
        return $this->merchantRepository->findAll();
    }

    /**
     * @param string $title
     * @return MerchantInterface
     */
    public function createMerchant(string $title): MerchantInterface
    {
        $merchant = new Merchant($title);

        $em = $this->emResolver->getEntityManager($merchant);

        $em->persist($merchant);
        $em->flush($merchant);

        return $merchant;
    }

}