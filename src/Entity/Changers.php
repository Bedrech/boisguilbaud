<?php

namespace App\Entity;

use App\Repository\ChangersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChangersRepository::class)]
class Changers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $annee = null;

    #[ORM\Column]
    private ?int $livraisons = null;

    #[ORM\Column]
    private ?int $chantiers = null;

    #[ORM\Column]
    private ?int $steres = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getLivraisons(): ?int
    {
        return $this->livraisons;
    }

    public function setLivraisons(int $livraisons): static
    {
        $this->livraisons = $livraisons;

        return $this;
    }

    public function getChantiers(): ?int
    {
        return $this->chantiers;
    }

    public function setChantiers(int $chantiers): static
    {
        $this->chantiers = $chantiers;

        return $this;
    }

    public function getSteres(): ?int
    {
        return $this->steres;
    }

    public function setSteres(int $steres): static
    {
        $this->steres = $steres;

        return $this;
    }
}
