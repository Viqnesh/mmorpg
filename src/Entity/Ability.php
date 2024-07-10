<?php

namespace App\Entity;

use App\Repository\AbilityRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AbilityRepository::class)
 */
class Ability
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=CoupSpeciale::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $coupSpeciale;

    /**
     * @ORM\ManyToOne(targetEntity=ArmeSpeciale::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $ArmeSpeciale;

    /**
     * @ORM\ManyToOne(targetEntity=Skill::class)
     * @ORM\JoinColumn(nullable=true)
     */
    private $skill;

    /**
     * @ORM\ManyToOne(targetEntity=Personnage::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_character;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoupSpeciale(): ?CoupSpeciale
    {
        return $this->coupSpeciale;
    }

    public function setCoupSpeciale(?CoupSpeciale $coupSpeciale): self
    {
        $this->coupSpeciale = $coupSpeciale;

        return $this;
    }

    public function getArmeSpeciale(): ?ArmeSpeciale
    {
        return $this->ArmeSpeciale;
    }

    public function setArmeSpeciale(?ArmeSpeciale $ArmeSpeciale): self
    {
        $this->ArmeSpeciale = $ArmeSpeciale;

        return $this;
    }

    public function getSkill(): ?Skill
    {
        return $this->skill;
    }

    public function setSkill(?Skill $skill): self
    {
        $this->skill = $skill;

        return $this;
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
}
