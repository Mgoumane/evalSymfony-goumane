<?php

namespace App\Entity;

use App\Repository\AppartementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AppartementRepository::class)]
class Appartement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $superficie = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptif = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Immeuble $unImmeuble = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSuperficie(): ?string
    {
        return $this->superficie;
    }

    public function setSuperficie(string $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getDescriptif(): ?string
    {
        return $this->descriptif;
    }

    public function setDescriptif(string $descriptif): self
    {
        $this->descriptif = $descriptif;

        return $this;
    }

    public function getUnImmeuble(): ?Immeuble
    {
        return $this->unImmeuble;
    }

    public function setUnImmeuble(?Immeuble $unImmeuble): self
    {
        $this->unImmeuble = $unImmeuble;

        return $this;
    }

    public function __toString()
    {
        return $this->superficie;
    }
}
