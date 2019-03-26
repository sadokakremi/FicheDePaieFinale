<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChargeRepository")
 */
class Charge
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
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $charge_cnss_patron;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $charge_cnss_employe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $taxe;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getChargeCnssPatron(): ?string
    {
        return $this->charge_cnss_patron;
    }

    public function setChargeCnssPatron(string $charge_cnss_patron): self
    {
        $this->charge_cnss_patron = $charge_cnss_patron;

        return $this;
    }

    public function getChargeCnssEmploye(): ?string
    {
        return $this->charge_cnss_employe;
    }

    public function setChargeCnssEmploye(string $charge_cnss_employe): self
    {
        $this->charge_cnss_employe = $charge_cnss_employe;

        return $this;
    }

    public function getTaxe(): ?string
    {
        return $this->taxe;
    }

    public function setTaxe(string $taxe): self
    {
        $this->taxe = $taxe;

        return $this;
    }
}
