<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
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
    private $ImageName;

    /**
     * @ORM\Column(type="datetime")
     */
    private $UpdatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="images")
     */
    private $ProductId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageName(): ?string
    {
        return $this->ImageName;
    }

    public function setImageName(string $ImageName): self
    {
        $this->ImageName = $ImageName;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->UpdatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $UpdatedAt): self
    {
        $this->UpdatedAt = $UpdatedAt;

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
