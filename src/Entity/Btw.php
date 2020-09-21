<?php

namespace App\Entity;

use App\Repository\BtwRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BtwRepository::class)
 */
class Btw
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
    private $Percentage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Omschrijving;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPercentage(): ?int
    {
        return $this->Percentage;
    }

    public function setPercentage(int $Percentage): self
    {
        $this->Percentage = $Percentage;

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
}
