<?php

namespace App\Entity;

use App\Repository\InventoryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InventoryRepository::class)
 */
class Inventory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Personnage::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_character;

    /**
     * @ORM\Column(type="integer")
     */
    private $size;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCharacter(): ?Personnage
    {
        return $this->id_character;
    }

    public function setIdCharacter(?Personnage $id_character): self
    {
        $this->id_character = $id_character;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }
}
