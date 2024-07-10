<?php

namespace App\Entity;

use App\Repository\PersonnageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonnageRepository::class)
 */
class Personnage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $HP;

    /**
     * @ORM\Column(type="integer")
     */
    private $PM;

    /**
     * @ORM\Column(type="integer")
     */
    private $XP;

    /**
     * @ORM\Column(type="integer")
     */
    private $atk;

    /**
     * @ORM\Column(type="integer")
     */
    private $def;

    /**
     * @ORM\Column(type="integer")
     */
    private $mag;

    /**
     * @ORM\Column(type="integer")
     */
    private $pwr;

    /**
     * @ORM\Column(type="integer")
     */
    private $intel;

    /**
     * @ORM\Column(type="integer")
     */
    private $agi;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $player;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $classe;

    /**
     * @ORM\ManyToOne(targetEntity=Level::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $lvl;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $coin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $lng;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $currentCity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getHP(): ?int
    {
        return $this->HP;
    }

    public function setHP(int $HP): self
    {
        $this->HP = $HP;

        return $this;
    }

    public function getPM(): ?int
    {
        return $this->PM;
    }

    public function setPM(int $PM): self
    {
        $this->PM = $PM;

        return $this;
    }

    public function getXP(): ?int
    {
        return $this->XP;
    }

    public function setXP(int $XP): self
    {
        $this->XP = $XP;

        return $this;
    }

    public function getAtk(): ?int
    {
        return $this->atk;
    }

    public function setAtk(int $atk): self
    {
        $this->atk = $atk;

        return $this;
    }

    public function getDef(): ?int
    {
        return $this->def;
    }

    public function setDef(int $def): self
    {
        $this->def = $def;

        return $this;
    }

    public function getMag(): ?int
    {
        return $this->mag;
    }

    public function setMag(int $mag): self
    {
        $this->mag = $mag;

        return $this;
    }

    public function getPwr(): ?int
    {
        return $this->pwr;
    }

    public function setPwr(int $pwr): self
    {
        $this->pwr = $pwr;

        return $this;
    }

    public function getIntel(): ?int
    {
        return $this->intel;
    }

    public function setIntel(int $intel): self
    {
        $this->intel = $intel;

        return $this;
    }

    public function getAgi(): ?int
    {
        return $this->agi;
    }

    public function setAgi(int $agi): self
    {
        $this->agi = $agi;

        return $this;
    }

    public function getPlayer(): ?User
    {
        return $this->player;
    }

    public function setPlayer(?User $player): self
    {
        $this->player = $player;

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    public function getLvl(): ?Level
    {
        return $this->lvl;
    }

    public function setLvl(?Level $lvl): self
    {
        $this->lvl = $lvl;

        return $this;
    }

    public function getCoin(): ?int
    {
        return $this->coin;
    }

    public function setCoin(?int $coin): self
    {
        $this->coin = $coin;

        return $this;
    }

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(?float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(?float $lng): self
    {
        $this->lng = $lng;

        return $this;
    }

    public function getCurrentCity(): ?string
    {
        return $this->currentCity;
    }

    public function setCurrentCity(?string $currentCity): self
    {
        $this->currentCity = $currentCity;

        return $this;
    }

}
