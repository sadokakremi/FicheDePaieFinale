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

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Employe", cascade={"persist", "remove"})
     */
    private $employe;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PartResponsablePayement", cascade={"persist", "remove"})
     */
    public $partresponsablepayement;

    /**
     * AttestationTravail constructor.
     * @param $date_impression
     */
    public function __construct()
    {
        $this->date_impression = new \DateTime();
    }

    public function __toText()
    {
        return 'id'. $this->id.'  ';
    }

    /**
     * @return mixed
     */
    public function getPartresponsablepayement()
    {
        return $this->partresponsablepayement;
    }


    /**
     * @param mixed $partresponsablepayement
     */
    public function setPartresponsablepayement($partresponsablepayement)
    {
        $this->partresponsablepayement = $partresponsablepayement;
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
