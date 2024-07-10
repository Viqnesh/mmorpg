<?php

namespace App\Entity;

use App\Repository\ItemInventoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ItemInventoryRepository::class)
 */
class ItemInventory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idItem;

    /**
     * @ORM\ManyToOne(targetEntity=Inventory::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $idInventory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdItem(): ?Item
    {
        return $this->idItem;
    }

    public function setIdItem(?Item $idItem): self
    {
        $this->idItem = $idItem;

        return $this;
    }

    public function getIdInventory(): ?Inventory
    {
        return $this->idInventory;
    }

    public function setIdInventory(?Inventory $idInventory): self
    {
        $this->idInventory = $idInventory;

        return $this;
    }
}
