<?php
declare(strict_types=1);

namespace Domain\Currency\Repository;

use Domain\Currency\Entity\Currency;
use Infrastructure\Repository\AbstractRepository;

class CurrencyRepository extends AbstractRepository
{

    protected function getEntity(): string
    {
        return Currency::class;
    }
}