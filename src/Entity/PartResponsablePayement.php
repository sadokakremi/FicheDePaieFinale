<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartResponsablePayementRepository")
 */
class PartResponsablePayement
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
    public $nom_employeur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse_employeur;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone_employeur;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email_employeur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Banque", inversedBy="payement")
     * @ORM\JoinColumn(nullable=false)
     */
    private $banque;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Poste", inversedBy="payement")
     * @ORM\JoinColumn(nullable=false)
     */

    private $poste;

    public function __toText()
    {
        return 'id'. $this->id.'  '.'nom_employeur'.' '.$this->nom_employeur.'  '.'adresse_employeur'.' '.$this->adresse_employeur.'  '.'telephone_employeur'.' '.$this->telephone_employeur.'  '.'email_employeur'.' '.$this->email_employeur;
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEmployeur(): ?string
    {
        return $this->nom_employeur;
    }

    public function setNomEmployeur(string $nom_employeur): self
    {
        $this->nom_employeur = $nom_employeur;

        return $this;
    }

    public function getAdresseEmployeur(): ?string
    {
        return $this->adresse_employeur;
    }

    public function setAdresseEmployeur(string $adresse_employeur): self
    {
        $this->adresse_employeur = $adresse_employeur;

        return $this;
    }

    public function getTelephoneEmployeur(): ?string
    {
        return $this->telephone_employeur;
    }

    public function setTelephoneEmployeur(string $telephone_employeur): self
    {
        $this->telephone_employeur = $telephone_employeur;

        return $this;
    }

    public function getEmailEmployeur(): ?string
    {
        return $this->email_employeur;
    }

    public function setEmailEmployeur(string $email_employeur): self
    {
        $this->email_employeur = $email_employeur;

        return $this;
    }

    public function getBanque(): ?Banque
    {
        return $this->banque;
    }

    public function setBanque(?Banque $banque): self
    {
        $this->banque = $banque;

        return $this;
    }

    public function getPoste(): ?Poste
    {
        return $this->poste;
    }

    public function setPoste(?Poste $poste): self
    {
        $this->poste = $poste;

        return $this;
    }





}
