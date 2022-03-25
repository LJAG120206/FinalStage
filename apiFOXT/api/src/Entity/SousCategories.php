<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SousCategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=SousCategoriesRepository::class)
 * @ApiResource
 */
class SousCategories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="sousCategories")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorieParent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToMany(targetEntity=Experts::class, mappedBy="sousCategories")
     */
    private $experts;

    /**
     * @ORM\ManyToMany(targetEntity=Chemins::class, mappedBy="sousCategories")
     */
    private $chemins;

    public function __construct()
    {
        $this->experts = new ArrayCollection();
        $this->chemins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorieParent(): ?Categories
    {
        return $this->categorieParent;
    }

    public function setCategorieParent(?Categories $categorieParent): self
    {
        $this->categorieParent = $categorieParent;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Experts>
     */
    public function getExperts(): Collection
    {
        return $this->experts;
    }

    public function addExpert(Experts $expert): self
    {
        if (!$this->experts->contains($expert)) {
            $this->experts[] = $expert;
            $expert->addSousCategory($this);
        }

        return $this;
    }

    public function removeExpert(Experts $expert): self
    {
        if ($this->experts->removeElement($expert)) {
            $expert->removeSousCategory($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Chemins>
     */
    public function getChemins(): Collection
    {
        return $this->chemins;
    }

    public function addChemin(Chemins $chemin): self
    {
        if (!$this->chemins->contains($chemin)) {
            $this->chemins[] = $chemin;
            $chemin->addSousCategory($this);
        }

        return $this;
    }

    public function removeChemin(Chemins $chemin): self
    {
        if ($this->chemins->removeElement($chemin)) {
            $chemin->removeSousCategory($this);
        }

        return $this;
    }
}
