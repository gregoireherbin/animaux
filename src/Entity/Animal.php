<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalRepository::class)]
class Animal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $poids = null;

    #[ORM\Column]
    private ?int $taille = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\ManyToMany(targetEntity: Continent::class, inversedBy: 'animals')]
    private Collection $continents;

    #[ORM\Column]
    private ?bool $dangereux = null;

    #[ORM\ManyToOne(inversedBy: 'relation')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Famille $famille = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null; // 🔹 Correction ici (au lieu de $relation)

    public function __construct()
    {
        $this->continents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->poids;
    }

    public function setPoids(int $poids): static
    {
        $this->poids = $poids;

        return $this;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): static
    {
        $this->taille = $taille;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Collection<int, Continent>
     */
    public function getContinents(): Collection
    {
        return $this->continents;
    }

    public function addContinent(Continent $continent): static
    {
        if (!$this->continents->contains($continent)) {
            $this->continents->add($continent);
        }

        return $this;
    }

    public function removeContinent(Continent $continent): static
    {
        $this->continents->removeElement($continent); // 🔹 Correction ici

        return $this;
    }

    public function isDangereux(): ?bool
    {
        return $this->dangereux;
    }

    public function setDangereux(bool $dangereux): static
    {
        $this->dangereux = $dangereux;

        return $this;
    }

    public function getFamille(): ?Famille
    {
        return $this->famille;
    }

    public function setFamille(?Famille $famille): static
    {
        $this->famille = $famille;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }
}
