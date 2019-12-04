<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BanqueRepository")
 */
class Banque
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
    public $nom_banque;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse_banque;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone_banque;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PartResponsablePayement", mappedBy="banque")
     */
    private $payement;

    public function __toText()
    {
        return 'id'. $this->id.'  '.'nom_banque'.' '.$this->nom_banque.'  '.'adresse_banque'.' '.$this->adresse_banque.'  '.'telephone_banque'.' '.$this->telephone_banque;
    }

    public function __construct()
    {
        $this->payement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomBanque(): ?string
    {
        return $this->nom_banque;
    }

    public function setNomBanque(string $nom_banque): self
    {
        $this->nom_banque = $nom_banque;

        return $this;
    }

    public function getAdresseBanque(): ?string
    {
        return $this->adresse_banque;
    }

    public function setAdresseBanque(string $adresse_banque): self
    {
        $this->adresse_banque = $adresse_banque;

        return $this;
    }

    public function getTelephoneBanque(): ?string
    {
        return $this->telephone_banque;
    }

    public function setTelephoneBanque(string $telephone_banque): self
    {
        $this->telephone_banque = $telephone_banque;

        return $this;
    }

    /**
     * @return Collection|PartResponsablePayement[]
     */
    public function getPayement(): Collection
    {
        return $this->payement;
    }

    public function addPayement(PartResponsablePayement $payement): self
    {
        if (!$this->payement->contains($payement)) {
            $this->payement[] = $payement;
            $payement->setBanque($this);
        }

        return $this;
    }

    public function removePayement(PartResponsablePayement $payement): self
    {
        if ($this->payement->contains($payement)) {
            $this->payement->removeElement($payement);
            // set the owning side to null (unless already changed)
            if ($payement->getBanque() === $this) {
                $payement->setBanque(null);
            }
        }

        return $this;
    }
}
