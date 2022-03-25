<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CheminsRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CheminsRepository::class)
 * @ApiResource(
 * normalizationContext={
 *  "groups"={"clients_read"}
 * }
 * )
 */
class Chemins
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"clients_read"})
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Categories::class, inversedBy="chemins")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity=SousCategories::class, inversedBy="chemins")
     */
    private $sousCategories;

    /**
     * @ORM\ManyToMany(targetEntity=Experts::class, inversedBy="chemins")
     */
    private $experts;

    /**
     * @ORM\ManyToOne(targetEntity=Experts::class, inversedBy="chemins")
     */
    private $expertActif;

    /**
     * @ORM\ManyToOne(targetEntity=Clients::class, inversedBy="chemins")
     * @Groups({"clients_read"})
     */
    private $client;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"clients_read"})
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"clients_read"})
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity=RendezVous::class, mappedBy="chemin")
     */
    private $rendezVouses;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->sousCategories = new ArrayCollection();
        $this->experts = new ArrayCollection();
        $this->rendezVouses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Categories>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        $this->categories->removeElement($category);

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
        }

        return $this;
    }

    public function removeSousCategory(SousCategories $sousCategory): self
    {
        $this->sousCategories->removeElement($sousCategory);

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
        }

        return $this;
    }

    public function removeExpert(Experts $expert): self
    {
        $this->experts->removeElement($expert);

        return $this;
    }

    public function getExpertActif(): ?Experts
    {
        return $this->expertActif;
    }

    public function setExpertActif(?Experts $expertActif): self
    {
        $this->expertActif = $expertActif;

        return $this;
    }

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;

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
     * @return Collection<int, RendezVous>
     */
    public function getRendezVouses(): Collection
    {
        return $this->rendezVouses;
    }

    public function addRendezVouse(RendezVous $rendezVouse): self
    {
        if (!$this->rendezVouses->contains($rendezVouse)) {
            $this->rendezVouses[] = $rendezVouse;
            $rendezVouse->setChemin($this);
        }

        return $this;
    }

    public function removeRendezVouse(RendezVous $rendezVouse): self
    {
        if ($this->rendezVouses->removeElement($rendezVouse)) {
            // set the owning side to null (unless already changed)
            if ($rendezVouse->getChemin() === $this) {
                $rendezVouse->setChemin(null);
            }
        }

        return $this;
    }
}
