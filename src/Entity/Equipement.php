<?php

namespace App\Entity;

use App\Repository\EquipementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquipementRepository::class)
 */
class Equipement
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
     * @ORM\ManyToOne(targetEntity=Item::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $tete;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $Jambes;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $Main;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $Corps;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $Melee;

    /**
     * @ORM\ManyToOne(targetEntity=Item::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $Distance;

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

    public function getTete(): ?Item
    {
        return $this->tete;
    }

    public function setTete(?Item $tete): self
    {
        $this->tete = $tete;

        return $this;
    }

    public function getJambes(): ?Item
    {
        return $this->Jambes;
    }

    public function setJambes(?Item $Jambes): self
    {
        $this->Jambes = $Jambes;

        return $this;
    }

    public function getMain(): ?Item
    {
        return $this->Main;
    }

    public function setMain(?Item $Main): self
    {
        $this->Main = $Main;

        return $this;
    }

    public function getCorps(): ?Item
    {
        return $this->Corps;
    }

    public function setCorps(?Item $Corps): self
    {
        $this->Corps = $Corps;

        return $this;
    }

    public function getMelee(): ?Item
    {
        return $this->Melee;
    }

    public function setMelee(?Item $Melee): self
    {
        $this->Melee = $Melee;

        return $this;
    }

    public function getDistance(): ?Item
    {
        return $this->Distance;
    }

    public function setDistance(?Item $Distance): self
    {
        $this->Distance = $Distance;

        return $this;
    }
}
