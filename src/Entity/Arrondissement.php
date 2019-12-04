<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArrondissementRepository")
 */
class Arrondissement
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
    public $nom_arrondissement;



    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Delegation", mappedBy="delegations")
     */
    private $delegations;





    public function __toText()
    {
        return 'id'. $this->id.'  '.'nom_arrondissement'.' '.$this->nom_arrondissement;
    }


    public function __construct()
    {
        $this->delegations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomArrondissement(): ?string
    {
        return $this->nom_arrondissement;
    }

    public function setNomArrondissement(string $nom_arrondissement): self
    {
        $this->nom_arrondissement = $nom_arrondissement;

        return $this;
    }

    /**
     * @return Collection|Delegation[]
     */
    public function getDelegations(): Collection
    {
        return $this->delegations;
    }

    public function addDelegation(Delegation $delegation): self
    {
        if (!$this->delegations->contains($delegation)) {
            $this->delegations[] = $delegation;
            $delegation->setDelegations($this);
        }

        return $this;
    }

    public function removeDelegation(Delegation $delegation): self
    {
        if ($this->delegations->contains($delegation)) {
            $this->delegations->removeElement($delegation);
            // set the owning side to null (unless already changed)
            if ($delegation->getDelegations() === $this) {
                $delegation->setDelegations(null);
            }
        }

        return $this;
    }
}
