<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RappelRepository")
 */
class Rappel
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
     * @ORM\Column(type="date")
     */
    private $espace_temps_requis;

    public function __toText()
    {
        return 'id'. $this->id.'  '.'date_saisie'.' '.$this->date_saisie.'  '.'espace_temps_requis'.' '.$this->espace_temps_requis;
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

    public function getEspaceTempsRequis(): ?\DateTimeInterface
    {
        return $this->espace_temps_requis;
    }

    public function setEspaceTempsRequis(\DateTimeInterface $espace_temps_requis): self
    {
        $this->espace_temps_requis = $espace_temps_requis;

        return $this;
    }
}
