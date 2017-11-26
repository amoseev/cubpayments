<?php
declare(strict_types=1);


namespace Domain\MerchantsPaymentsAccounts\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Domain\MerchantsPaymentsAccounts\Interfaces\PaymentAccountInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="merchant_payment_account", schema="merchants")
 */
class PaymentAccount implements PaymentAccountInterface
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    protected $isEnabled;


    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $secretKey;


    public function __construct(string $title, string $secretKey, bool $isEnabled = true)
    {
        $this->title = $title;
        $this->secretKey = $secretKey;
        $this->isEnabled = $isEnabled;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool) $this->isEnabled;
    }

    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

}