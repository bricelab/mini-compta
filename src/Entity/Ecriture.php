<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\MappedSuperclass
 */
class Ecriture 
{
    use TimestampTrait;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $referencePiece;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nature;

    /**
     * @ORM\Column(type="float")
     */
    private $montantHT;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tva;

    /**
     * @ORM\Column(type="float")
     */
    private $montantTTC;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $moyen;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

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

    public function getReferencePiece(): ?string
    {
        return $this->referencePiece;
    }

    public function setReferencePiece(?string $referencePiece): self
    {
        $this->referencePiece = $referencePiece;

        return $this;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(string $nature): self
    {
        $this->nature = $nature;

        return $this;
    }

    public function getMontantHT(): ?float
    {
        return $this->montantHT;
    }

    public function setMontantHT(float $montantHT): self
    {
        $this->montantHT = $montantHT;

        return $this;
    }

    public function getTva(): ?float
    {
        return $this->tva;
    }

    public function setTva(?float $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getMontantTTC(): ?float
    {
        return $this->montantTTC;
    }

    public function setMontantTTC(float $montantTTC): self
    {
        $this->montantTTC = $montantTTC;

        return $this;
    }

    public function getMoyen(): ?string
    {
        return $this->moyen;
    }

    public function setMoyen(string $moyen): self
    {
        $this->moyen = $moyen;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}