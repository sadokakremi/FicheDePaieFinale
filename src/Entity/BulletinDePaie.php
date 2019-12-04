<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BulletinDePaieRepository")
 */
class BulletinDePaie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_saisie;
    

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_demande;

    public function __toText()
    {
        return 'id'. $this->id.'  '.'date_saisie'.' '.$this->date_saisie.'  '.'date_demande'.' '.$this->date_demande;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSaisie(): ?\DateTimeInterface
    {
        return $this->date_saisie;
    }

    public function setDateSaisie(\DateTimeInterface $date_saisie): self
    {
        $this->date_saisie = $date_saisie;

        return $this;
    }

    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->date_demande;
    }

    public function setDateDemande(\DateTimeInterface $date_demande): self
    {
        $this->date_demande = $date_demande;

        return $this;
    }
}
