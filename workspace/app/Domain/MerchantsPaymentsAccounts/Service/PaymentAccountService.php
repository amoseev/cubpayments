<?php
declare(strict_types=1);

namespace Domain\MerchantsPaymentsAccounts\Service;

use Domain\MerchantsPaymentsAccounts\Entity\PaymentAccount;
use Domain\MerchantsPaymentsAccounts\Interfaces\PaymentAccountInterface;
use Domain\MerchantsPaymentsAccounts\Repository\PaymentAccountRepository;
use Infrastructure\EntityManager\EntityManagerResolver;

class PaymentAccountService
{

    /**
     * @var EntityManagerResolver
     */
    private $emResolver;
    /**
     * @var PaymentAccountRepository
     */
    private $paymentAccountRepository;

    public function __construct(EntityManagerResolver $emResolver, PaymentAccountRepository $paymentAccountRepository)
    {
        $this->emResolver = $emResolver;
        $this->paymentAccountRepository = $paymentAccountRepository;
    }

    /**
     * @param int $id
     * @return PaymentAccountInterface
     */
    public function getPaymentAccount(int $id): PaymentAccountInterface
    {
        return $this->paymentAccountRepository->get($id);
    }

    /**
     * @param int $id
     * @return PaymentAccountInterface
     */
    public function createPaymentAccount(string $title): PaymentAccountInterface
    {
        $paymentAccount = new PaymentAccount($title, str_random(32));
        $em = $this->emResolver->getEntityManager($paymentAccount);
        $em->persist($paymentAccount);
        $em->flush($paymentAccount);

        return $paymentAccount;
    }
}