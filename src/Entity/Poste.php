<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PosteRepository")
 */
class Poste
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
    public $nom_poste;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse_poste;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone_poste;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PartResponsablePayement", inversedBy="postes")
     */
    private $paiement;

    public function __toText()
    {
        return 'id'. $this->id.'  '.'nom_poste'.' '.$this->nom_poste.'  '.'adresse_poste'.' '.$this->adresse_poste.'  '.'telephone_poste'.' '.$this->telephone_poste;
    }

    public function __construct()
    {
        $this->paiement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPoste(): ?string
    {
        return $this->nom_poste;
    }

    public function setNomPoste(string $nom_poste): self
    {
        $this->nom_poste = $nom_poste;

        return $this;
    }

    public function getAdressePoste(): ?string
    {
        return $this->adresse_poste;
    }

    public function setAdressePoste(string $adresse_poste): self
    {
        $this->adresse_poste = $adresse_poste;

        return $this;
    }

    public function getTelephonePoste(): ?string
    {
        return $this->telephone_poste;
    }

    public function setTelephonePoste(string $telephone_poste): self
    {
        $this->telephone_poste = $telephone_poste;

        return $this;
    }

    /**
     * @return Collection|PartResponsablePayement[]
     */
    public function getPaiement(): Collection
    {
        return $this->paiement;
    }

    public function addPaiement(PartResponsablePayement $paiement): self
    {
        if (!$this->paiement->contains($paiement)) {
            $this->paiement[] = $paiement;
        }

        return $this;
    }

    public function removePaiement(PartResponsablePayement $paiement): self
    {
        if ($this->paiement->contains($paiement)) {
            $this->paiement->removeElement($paiement);
        }

        return $this;
    }
}
