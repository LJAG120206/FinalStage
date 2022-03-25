<?php

namespace App\Entity;

use App\Repository\RendezVousRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RendezVousRepository::class)
 */
class RendezVous
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
    private $dateHeure;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity=Clients::class, inversedBy="rendezVouses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    /**
     * @ORM\OneToMany(targetEntity=Experts::class, mappedBy="rendezVous")
     */
    private $expert;

    /**
     * @ORM\ManyToOne(targetEntity=Chemins::class, inversedBy="rendezVouses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chemin;

    public function __construct()
    {
        $this->expert = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeure(): ?string
    {
        return $this->dateHeure;
    }

    public function setDateHeure(string $dateHeure): self
    {
        $this->dateHeure = $dateHeure;

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

    public function getClient(): ?Clients
    {
        return $this->client;
    }

    public function setClient(?Clients $client): self
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return Collection<int, Experts>
     */
    public function getExpert(): Collection
    {
        return $this->expert;
    }

    public function addExpert(Experts $expert): self
    {
        if (!$this->expert->contains($expert)) {
            $this->expert[] = $expert;
            $expert->setRendezVous($this);
        }

        return $this;
    }

    public function removeExpert(Experts $expert): self
    {
        if ($this->expert->removeElement($expert)) {
            // set the owning side to null (unless already changed)
            if ($expert->getRendezVous() === $this) {
                $expert->setRendezVous(null);
            }
        }

        return $this;
    }

    public function getChemin(): ?Chemins
    {
        return $this->chemin;
    }

    public function setChemin(?Chemins $chemin): self
    {
        $this->chemin = $chemin;

        return $this;
    }
}
