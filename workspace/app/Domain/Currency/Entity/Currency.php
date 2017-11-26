<?php
declare(strict_types=1);

namespace Domain\Currency\Entity;

use Domain\Currency\Interfaces\CurrencyInterface;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="currency")
 */
class Currency implements CurrencyInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @ORM\Column(type="float")
     */
    protected $rate;

    /**
     * @ORM\Column(type="string", length=3)
     */
    protected $iso;

    /**
     * @ORM\Column(type="integer")
     */
    protected $isEnabled;

    /**
     * @param $title
     */
    public function __construct(string $title, float $rate, string $iso)
    {
        $this->title = $title;
        $this->rate = $rate;
        $this->iso = $iso;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getCurrencyId(): int
    {
        return $this->getId();
    }

    public function getCurrencyIso(): string
    {
        return $this->iso;
    }
}