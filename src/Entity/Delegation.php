<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DelegationRepository")
 */
class Delegation
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
    public $nom_delegation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Arrondissement", inversedBy="delegations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrondissement;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PosteDeTravail", mappedBy="postesdetravail")
     */
    private $posteDeTravails;

    public function __toText()
    {
        return 'id'. $this->id.'  '.'nom_delegation'.' '.$this->nom_delegation;
    }

    public function __construct()
    {
        $this->posteDeTravails = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomDelegation(): ?string
    {
        return $this->nom_delegation;
    }

    public function setNomDelegation(string $nom_delegation): self
    {
        $this->nom_delegation = $nom_delegation;

        return $this;
    }

    public function getArrondissement(): ?Arrondissement
    {
        return $this->arrondissement;
    }

    public function setArrondissement(?Arrondissement $arrondissement): self
    {
        $this->arrondissement = $arrondissement;

        return $this;
    }

    /**
     * @return Collection|PosteDeTravail[]
     */
    public function getPosteDeTravails(): Collection
    {
        return $this->posteDeTravails;
    }

    public function addPosteDeTravail(PosteDeTravail $posteDeTravail): self
    {
        if (!$this->posteDeTravails->contains($posteDeTravail)) {
            $this->posteDeTravails[] = $posteDeTravail;
            $posteDeTravail->setPostesdetravail($this);
        }

        return $this;
    }

    public function removePosteDeTravail(PosteDeTravail $posteDeTravail): self
    {
        if ($this->posteDeTravails->contains($posteDeTravail)) {
            $this->posteDeTravails->removeElement($posteDeTravail);
            // set the owning side to null (unless already changed)
            if ($posteDeTravail->getPostesdetravail() === $this) {
                $posteDeTravail->setPostesdetravail(null);
            }
        }

        return $this;
    }
}
