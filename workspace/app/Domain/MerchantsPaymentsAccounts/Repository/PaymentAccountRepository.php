<?php
declare(strict_types=1);

namespace Domain\MerchantsPaymentsAccounts\Repository;

use Domain\MerchantsPaymentsAccounts\Entity\PaymentAccount;
use Infrastructure\Repository\AbstractRepository;

class PaymentAccountRepository extends AbstractRepository
{
    protected function getEntity(): string
    {
        return PaymentAccount::class;
    }

}