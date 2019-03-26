<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AttestationTravailRepository")
 */
class AttestationTravail
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
    private $date_impression;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateImpression(): ?\DateTimeInterface
    {
        return $this->date_impression;
    }

    public function setDateImpression(\DateTimeInterface $date_impression): self
    {
        $this->date_impression = $date_impression;

        return $this;
    }
}
