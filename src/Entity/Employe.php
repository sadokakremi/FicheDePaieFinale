<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmployeRepository")
 * @UniqueEntity(
 *    fields={"cin"},
 *     message="Le cin que vous avez utilisé est deja inscrit"
 *
 * )
 */
class Employe
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
    private $cin;

    /**
     * @ORM\Column(type="integer")
     */
    private $cnss;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu_de_naissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut_familial;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $matricule;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $diplome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau_scolaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="date")
     */
    private $date_de_naissance;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut_travail;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Salaire", mappedBy="salaires")
     */
    private $salaires;

    /**
     * Employe constructor.
     * @param $createdAt
     */
    public function __construct()
    {
        $this->createdAt  = new \DateTime();
    }


    /**
     * @return mixed
     */
    public function getSalaires()
    {
        return $this->salaires;
    }

    /**
     * @param mixed $salaires
     */
    public function setSalaires($salaires)
    {
        $this->salaires = $salaires;
    }

    /**
     * @return mixed
     */
    public function getSalaireDeBase()
    {
        return $this->salaire_de_base;
    }

    /**
     * @param mixed $salaire_de_base
     */
    public function setSalaireDeBase($salaire_de_base)
    {
        $this->salaire_de_base = $salaire_de_base;
    }

    /**
     * @ORM\Column(type="float")
     */
    private $salaire_de_base;

    public function __toText()
    {
        return 'id'. $this->id.'  '.'cin'.' '.$this->cin.'  '.'cnss'.' '.$this->cnss.'  '.'nom'.' '.$this->nom.'  '.'prenom'.' '.$this->prenom.'  '.'lieu_de_naissance'.' '.$this->lieu_de_naissance.'  '.'statut_familial'.' '.$this->statut_familial.'  '.'adresse'.' '.$this->adresse.'  '.'matricule'.' '.$this->matricule.'  '.'telephone'.' '.$this->telephone.'  '.'diplome'.' '.$this->diplome.'  '.'niveau_scolaire'.' '.$this->niveau_scolaire.'  '.'age'.' '.$this->age.' '.'salaire_de_base'.' '.$this->salaire_de_base;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?int
    {
        return $this->cin;
    }

    public function setCin(int $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getCnss(): ?string
    {
        return $this->cnss;
    }

    public function setCnss(string $cnss): self
    {
        $this->cnss = $cnss;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getLieuDeNaissance(): ?string
    {
        return $this->lieu_de_naissance;
    }

    public function setLieuDeNaissance(string $lieu_de_naissance): self
    {
        $this->lieu_de_naissance = $lieu_de_naissance;

        return $this;
    }

    public function getStatutFamilial(): ?string
    {
        return $this->statut_familial;
    }

    public function setStatutFamilial(string $statut_familial): self
    {
        $this->statut_familial = $statut_familial;

        return $this;
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

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function getNiveauScolaire(): ?string
    {
        return $this->niveau_scolaire;
    }

    public function setNiveauScolaire(string $niveau_scolaire): self
    {
        $this->niveau_scolaire = $niveau_scolaire;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $date_de_naissance): self
    {
        $this->date_de_naissance = $date_de_naissance;

        return $this;
    }

    public function getDateDebutTravail(): ?\DateTimeInterface
    {
        return $this->date_debut_travail;
    }

    public function setDateDebutTravail(\DateTimeInterface $date_debut_travail): self
    {
        $this->date_debut_travail = $date_debut_travail;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }


}
