<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $saleprice;

    /**
     * @ORM\Column(type="integer")
     */
    private $buyprice;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaleprice(): ?int
    {
        return $this->saleprice;
    }

    public function setSaleprice(int $saleprice): self
    {
        $this->saleprice = $saleprice;

        return $this;
    }

    public function getBuyprice(): ?int
    {
        return $this->buyprice;
    }

    public function setBuyprice(int $buyprice): self
    {
        $this->buyprice = $buyprice;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
