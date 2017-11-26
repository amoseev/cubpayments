<?php
declare(strict_types=1);


namespace Merchants\Repository;


use Core\Repository\AbstractRepository;
use Merchants\Entity\Merchant;

class MerchantRepository extends AbstractRepository
{
    protected function getEntity(): string
    {
        return Merchant::class;
    }
}