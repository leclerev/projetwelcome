<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OfferRepository")
 */
class Offer
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
    private $price;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\user", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\good", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $good;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Comment", mappedBy="offer", cascade={"persist", "remove"})
     */
    private $comment;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(user $user): self
    {
        $this->user= $user;

        return $this;
    }

    public function getGood(): ?good
    {
        return $this->good;
    }

    public function setGood(good $good): self
    {
        $this->good = $good;

        return $this;
    }

    public function getComment(): ?Comment
    {
        return $this->comment;
    }

    public function setComment(Comment $comment): self
    {
        $this->comment = $comment;

        // set the owning side of the relation if necessary
        if ($this !== $comment->getOffer()) {
            $comment->setOffer($this);
        }

        return $this;
    }

}
