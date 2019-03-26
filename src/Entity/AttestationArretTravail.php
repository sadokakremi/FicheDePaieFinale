<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AttestationArretTravailRepository")
 */
class AttestationArretTravail
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
    private $date_arret;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $condition_arret;

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

    public function getDateArret(): ?\DateTimeInterface
    {
        return $this->date_arret;
    }

    public function setDateArret(\DateTimeInterface $date_arret): self
    {
        $this->date_arret = $date_arret;

        return $this;
    }

    public function getConditionArret(): ?string
    {
        return $this->condition_arret;
    }

    public function setConditionArret(string $condition_arret): self
    {
        $this->condition_arret = $condition_arret;

        return $this;
    }
}
