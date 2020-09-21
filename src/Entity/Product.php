<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Naam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Omschrijving;

    /**
     * @ORM\Column(type="integer")
     */
    private $Prijs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $frontpage;

    /**
     * @ORM\ManyToOne(targetEntity=Btw::class)
     */
    private $Btw;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="ProductId")
     */
    private $images;

    /**
     * @ORM\OneToMany(targetEntity=FactuurRegel::class, mappedBy="ProductId")
     */
    private $factuurRegels;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->factuurRegels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->Naam;
    }

    public function setNaam(string $Naam): self
    {
        $this->Naam = $Naam;

        return $this;
    }

    public function getOmschrijving(): ?string
    {
        return $this->Omschrijving;
    }

    public function setOmschrijving(string $Omschrijving): self
    {
        $this->Omschrijving = $Omschrijving;

        return $this;
    }

    public function getPrijs(): ?int
    {
        return $this->Prijs;
    }

    public function setPrijs(int $Prijs): self
    {
        $this->Prijs = $Prijs;

        return $this;
    }

    public function getFrontpage(): ?string
    {
        return $this->frontpage;
    }

    public function setFrontpage(string $frontpage): self
    {
        $this->frontpage = $frontpage;

        return $this;
    }

    public function getBtw(): ?Btw
    {
        return $this->Btw;
    }

    public function setBtw(?Btw $Btw): self
    {
        $this->Btw = $Btw;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setProductId($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getProductId() === $this) {
                $image->setProductId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|FactuurRegel[]
     */
    public function getFactuurRegels(): Collection
    {
        return $this->factuurRegels;
    }

    public function addFactuurRegel(FactuurRegel $factuurRegel): self
    {
        if (!$this->factuurRegels->contains($factuurRegel)) {
            $this->factuurRegels[] = $factuurRegel;
            $factuurRegel->setProductId($this);
        }

        return $this;
    }

    public function removeFactuurRegel(FactuurRegel $factuurRegel): self
    {
        if ($this->factuurRegels->contains($factuurRegel)) {
            $this->factuurRegels->removeElement($factuurRegel);
            // set the owning side to null (unless already changed)
            if ($factuurRegel->getProductId() === $this) {
                $factuurRegel->setProductId(null);
            }
        }

        return $this;
    }
}
