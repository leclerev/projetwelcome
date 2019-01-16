<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GoodRepository")
 */
class Good
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="bigint")
     */
    private $idGood;

    /**
     * @ORM\Column(type="integer")
     */
    private $typeGood;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $typePropertie;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descriptionGood;

    /**
     * @ORM\Column(type="integer")
     */
    private $numPeople;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasGarden;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasGarage;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasTerrace;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdGood(): ?int
    {
        return $this->idGood;
    }

    public function setIdGood(int $idGood): self
    {
        $this->idGood = $idGood;

        return $this;
    }

    public function getTypeGood(): ?int
    {
        return $this->typeGood;
    }

    public function setTypeGood(int $typeGood): self
    {
        $this->typeGood = $typeGood;

        return $this;
    }

    public function getTypePropertie(): ?int
    {
        return $this->typePropertie;
    }

    public function setTypePropertie(?int $typePropertie): self
    {
        $this->typePropertie = $typePropertie;

        return $this;
    }

    public function getDescriptionGood(): ?string
    {
        return $this->descriptionGood;
    }

    public function setDescriptionGood(?string $descriptionGood): self
    {
        $this->descriptionGood = $descriptionGood;

        return $this;
    }

    public function getNumPeople(): ?int
    {
        return $this->numPeople;
    }

    public function setNumPeople(int $numPeople): self
    {
        $this->numPeople = $numPeople;

        return $this;
    }

    public function getHasGarden(): ?bool
    {
        return $this->hasGarden;
    }

    public function setHasGarden(?bool $hasGarden): self
    {
        $this->hasGarden = $hasGarden;

        return $this;
    }

    public function getHasGarage(): ?bool
    {
        return $this->hasGarage;
    }

    public function setHasGarage(?bool $hasGarage): self
    {
        $this->hasGarage = $hasGarage;

        return $this;
    }

    public function getHasTerrace(): ?bool
    {
        return $this->hasTerrace;
    }

    public function setHasTerrace(?bool $hasTerrace): self
    {
        $this->hasTerrace = $hasTerrace;

        return $this;
    }
}
