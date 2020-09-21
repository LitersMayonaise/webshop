<?php

namespace App\Entity;

use App\Repository\BaseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BaseRepository::class)
 */
class Base
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
    private $Bedrijfsnaam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Logo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $UpdatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bases")
     */
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBedrijfsnaam(): ?string
    {
        return $this->Bedrijfsnaam;
    }

    public function setBedrijfsnaam(string $Bedrijfsnaam): self
    {
        $this->Bedrijfsnaam = $Bedrijfsnaam;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->Logo;
    }

    public function setLogo(string $Logo): self
    {
        $this->Logo = $Logo;

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

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
