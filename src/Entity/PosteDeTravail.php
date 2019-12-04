<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PosteDeTravailRepository")
 */
class PosteDeTravail
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
    private $adresse;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Delegation", inversedBy="posteDeTravails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $delegation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Arrondissement", inversedBy="posteDeTravails")
     * @ORM\JoinColumn(nullable=false)
     */
    private $arrondissement;

    public function __toText()
    {
        return 'id'. $this->id.'  '.'adresse'.' '.$this->adresse;
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDelegation(): ?Delegation
    {
        return $this->delegation;
    }

    public function setDelegation(?Delegation $delegation): self
    {
        $this->delegation = $delegation;

        return $this;
    }

    public function getArrondissement(): ?Arrondissement
    {
        return $this->arrondissement;
    }

    public function setArrondissement(?Arrondissement $arrondissement): self
    {
        $this->arrondissement = $arrondissement;

        return $this;
    }
}
