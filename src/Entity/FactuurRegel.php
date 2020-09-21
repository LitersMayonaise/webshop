<?php

namespace App\Entity;

use App\Repository\FactuurRegelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FactuurRegelRepository::class)
 */
class FactuurRegel
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Aantal;

    /**
     * @ORM\ManyToOne(targetEntity=Factuur::class, inversedBy="factuurRegels")
     */
    private $FactuurId;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="factuurRegels")
     */
    private $ProductId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAantal(): ?int
    {
        return $this->Aantal;
    }

    public function setAantal(int $Aantal): self
    {
        $this->Aantal = $Aantal;

        return $this;
    }

    public function getFactuurId(): ?Factuur
    {
        return $this->FactuurId;
    }

    public function setFactuurId(?Factuur $FactuurId): self
    {
        $this->FactuurId = $FactuurId;

        return $this;
    }

    public function getProductId(): ?Product
    {
        return $this->ProductId;
    }

    public function setProductId(?Product $ProductId): self
    {
        $this->ProductId = $ProductId;

        return $this;
    }
}
