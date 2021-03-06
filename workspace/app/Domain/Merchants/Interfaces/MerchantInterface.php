<?php
declare(strict_types=1);

namespace Domain\Merchants\Interfaces;

interface MerchantInterface
{
    public function getId(): int;

    public function getTitle(): string ;

    public function isEnabled(): bool;
}