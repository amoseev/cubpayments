<?php
declare(strict_types=1);

namespace Merchants\Entity;

use Doctrine\ORM\Mapping AS ORM;
use Merchants\Interfaces\MerchantInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="merchant")
 * @ORM\Embedded
 */
class Merchant implements MerchantInterface
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
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $isEnabled;


    public function __construct(string $title, bool $isEnabled = true)
    {
        $this->title = $title;
        $this->isEnabled = (int) $isEnabled;
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

}