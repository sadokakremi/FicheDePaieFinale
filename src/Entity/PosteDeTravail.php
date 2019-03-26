<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PosteDeTravailRepository")
 */
class PosteDeTravail
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Delegation", inversedBy="posteDeTravails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $delegation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPostesdetravail(): ?Delegation
    {
        return $this->delegation;
    }

    public function setPostesdetravail(?Delegation $postesdetravail): self
    {
        $this->delegation = $postesdetravail;

        return $this;
    }
}
