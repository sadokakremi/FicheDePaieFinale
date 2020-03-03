<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalaireRepository")
 *
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
     * Salaire constructor.
     * @param $categorie_salaire
     */
    public function __construct()
    {
        $this->date_attribution_salaire = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getEmploye()
    {
        return $this->employe;
    }

    /**
     * @param mixed $employe
     */
    public function setEmploye($employe)
    {
        $this->employe = $employe;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_de_paiement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie_salaire;



    /**
     * @ORM\Column(type="datetime")
     */
    private $date_attribution_salaire ;

    /**
     * @ORM\Column(type="integer")
     *
     */
    private $nbre_heures_travail;

    /**
     * @ORM\Column(type="integer")
     *
     */
    private $nbre_heures_sup1;
    /**
     * @ORM\Column(type="integer")
     *
     */
    private $nbre_heures_sup2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Employe", inversedBy="salaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $employe;

    /**
     * @return mixed
     */
    public function getNbreHeuresSup1()
    {
        return $this->nbre_heures_sup1;
    }

    /**
     * @param mixed $nbre_heures_sup1
     */
    public function setNbreHeuresSup1($nbre_heures_sup1)
    {
        $this->nbre_heures_sup1 = $nbre_heures_sup1;
    }

    /**
     * @return mixed
     */
    public function getNbreHeuresSup2()
    {
        return $this->nbre_heures_sup2;
    }

    /**
     * @param mixed $nbre_heures_sup2
     */
    public function setNbreHeuresSup2($nbre_heures_sup2)
    {
        $this->nbre_heures_sup2 = $nbre_heures_sup2;
    }

    /**
     * @return mixed
     */
    public function getPrime()
    {
        return $this->prime;
    }

    /**
     * @param mixed $prime
     */
    public function setPrime($prime)
    {
        $this->prime = $prime;
    }

    public function __toText()
    {
        return 'id'. $this->id.'  '.'type_de_paiement'.' '.$this->type_de_paiement.'  '.'categorie_salaire'.' '.$this->categorie_salaire.'  '.' '.'nbre_heures_travail'.' '.$this->nbre_heures_travail;
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




}
