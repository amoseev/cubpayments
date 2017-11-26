<?php
declare(strict_types=1);

namespace Domain\Currency\Interfaces;

interface CurrencyInterface
{
    const BASE_CURRENCY = 1;

    public function getCurrencyId(): int;

    public function getCurrencyIso(): string;
}