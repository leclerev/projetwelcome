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
    private $description;

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

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Address", cascade={"persist", "remove"}, fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
    private $address;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function toString(): string
    {
        return "ID: " . $this->getId() . " Description: " . $this->getDescription() . " Address: " . $this->getAddress()->toString();
    }
}
