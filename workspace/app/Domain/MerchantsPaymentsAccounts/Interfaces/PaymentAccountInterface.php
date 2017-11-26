<?php
declare(strict_types=1);


namespace Domain\MerchantsPaymentsAccounts\Interfaces;


interface PaymentAccountInterface
{

    public function getId(): int;

    public function getTitle(): string;

    public function getSecretKey(): string;

    public function isEnabled(): bool;
}