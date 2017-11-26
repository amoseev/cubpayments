<?php
declare(strict_types=1);

namespace Merchants\Service;

use Core\EntityManager\EntityManagerResolver;
use Merchants\Entity\Merchant;
use Merchants\Interfaces\MerchantInterface;
use Merchants\Repository\MerchantRepository;

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
     * @throws \Core\Exception\ModelNotFoundException
     */
    public function getMerchantById(int $id): MerchantInterface
    {
        return $this->merchantRepository->get($id);
    }

    public function createMerchant(string $title): MerchantInterface
    {
        $merchant = new Merchant($title);

        $em = $this->emResolver->getEntityManager($merchant);

        $em->persist($merchant);
        $em->flush();

        return $merchant;
    }

}