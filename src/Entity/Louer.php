<?php

namespace App\Entity;

use App\Repository\LouerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LouerRepository::class)]
class Louer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $prix_semaine = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre_semaines = null;

    #[ORM\Column(length: 255)]
    private ?string $dateDebutLocation = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Appartement $appartement = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Saison $saison = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixSemaine(): ?string
    {
        return $this->prix_semaine;
    }

    public function setPrixSemaine(string $prix_semaine): self
    {
        $this->prix_semaine = $prix_semaine;

        return $this;
    }

    public function getNombreSemaines(): ?string
    {
        return $this->nombre_semaines;
    }

    public function setNombreSemaines(string $nombre_semaines): self
    {
        $this->nombre_semaines = $nombre_semaines;

        return $this;
    }

    public function getDateDebutLocation(): ?string
    {
        return $this->dateDebutLocation;
    }

    public function setDateDebutLocation(string $dateDebutLocation): self
    {
        $this->dateDebutLocation = $dateDebutLocation;

        return $this;
    }

    public function getAppartement(): ?Appartement
    {
        return $this->appartement;
    }

    public function setAppartement(?Appartement $appartement): self
    {
        $this->appartement = $appartement;

        return $this;
    }

    public function getSaison(): ?Saison
    {
        return $this->saison;
    }

    public function setSaison(?Saison $saison): self
    {
        $this->saison = $saison;

        return $this;
    }
}
