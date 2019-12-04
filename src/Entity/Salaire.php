<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalaireRepository")
 */
class Salaire
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
    private $type_de_paiement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie_salaire;

    /**
     * @ORM\Column(type="float")
     */
    private $montant_salaire;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_attribution_salaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbre_heures_travail;

    public function __toText()
    {
        return 'id'. $this->id.'  '.'type_de_paiement'.' '.$this->type_de_paiement.'  '.'categorie_salaire'.' '.$this->categorie_salaire.'  '.'montant_salaire'.' '.$this->montant_salaire.'  '.'date_attribution_salaire'.' '.$this->date_attribution_salaire.'  '.'nbre_heures_travail'.' '.$this->nbre_heures_travail;
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeDePaiement(): ?string
    {
        return $this->type_de_paiement;
    }

    public function setTypeDePaiement(string $type_de_paiement): self
    {
        $this->type_de_paiement = $type_de_paiement;

        return $this;
    }

    public function getCategorieSalaire(): ?string
    {
        return $this->categorie_salaire;
    }

    public function setCategorieSalaire(string $categorie_salaire): self
    {
        $this->categorie_salaire = $categorie_salaire;

        return $this;
    }

    public function getMontantSalaire(): ?float
    {
        return $this->montant_salaire;
    }

    public function setMontantSalaire(float $montant_salaire): self
    {
        $this->montant_salaire = $montant_salaire;

        return $this;
    }

    public function getDateAttributionSalaire(): ?\DateTimeInterface
    {
        return $this->date_attribution_salaire;
    }

    public function setDateAttributionSalaire(\DateTimeInterface $date_attribution_salaire): self
    {
        $this->date_attribution_salaire = $date_attribution_salaire;

        return $this;
    }

    public function getNbreHeuresTravail(): ?int
    {
        return $this->nbre_heures_travail;
    }

    public function setNbreHeuresTravail(int $nbre_heures_travail): self
    {
        $this->nbre_heures_travail = $nbre_heures_travail;

        return $this;
    }

    public function getBulletin(): ?BulletinDePaie
    {
        return $this->bulletin;
    }

    public function setBulletin(?BulletinDePaie $bulletin): self
    {
        $this->bulletin = $bulletin;

        return $this;
    }
}
