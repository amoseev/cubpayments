<?php
declare(strict_types=1);

namespace Currency\Repository;

use Core\Repository\AbstractRepository;
use Currency\Entity\Currency;

class CurrencyRepository extends AbstractRepository
{

    protected function getEntity(): string
    {
        return Currency::class;
    }
}