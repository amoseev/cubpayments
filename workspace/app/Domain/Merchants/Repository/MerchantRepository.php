<?php
declare(strict_types=1);


namespace Domain\Merchants\Repository;

use Domain\Merchants\Entity\Merchant;
use Infrastructure\Repository\AbstractRepository;

class MerchantRepository extends AbstractRepository
{
    protected function getEntity(): string
    {
        return Merchant::class;
    }
}