<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 * @ApiResource
 */
class Mailer
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=SousCategories::class, mappedBy="categorieParent")
     */
    private $sousCategories;

    /**
     * @ORM\ManyToMany(targetEntity=Experts::class, mappedBy="categories")
     */
    private $experts;

    /**
     * @ORM\ManyToMany(targetEntity=Chemins::class, mappedBy="categories")
     */
    private $chemins;

    public function __construct()
    {
        $this->sousCategories = new ArrayCollection();
        $this->experts = new ArrayCollection();
        $this->chemins = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection<int, SousCategories>
     */
    public function getSousCategories(): Collection
    {
        return $this->sousCategories;
    }

    public function addSousCategory(SousCategories $sousCategory): self
    {
        if (!$this->sousCategories->contains($sousCategory)) {
            $this->sousCategories[] = $sousCategory;
            $sousCategory->setCategorieParent($this);
        }

        return $this;
    }

    public function removeSousCategory(SousCategories $sousCategory): self
    {
        if ($this->sousCategories->removeElement($sousCategory)) {
            // set the owning side to null (unless already changed)
            if ($sousCategory->getCategorieParent() === $this) {
                $sousCategory->setCategorieParent(null);
            }
        }

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
            $expert->addCategory($this);
        }

        return $this;
    }

    public function removeExpert(Experts $expert): self
    {
        if ($this->experts->removeElement($expert)) {
            $expert->removeCategory($this);
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
            $chemin->addCategory($this);
        }

        return $this;
    }

    public function removeChemin(Chemins $chemin): self
    {
        if ($this->chemins->removeElement($chemin)) {
            $chemin->removeCategory($this);
        }

        return $this;
    }
}
