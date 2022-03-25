<?php

namespace App\Entity;

use App\Entity\Users;
use App\Entity\Chemins;
use App\Entity\RendezVous;
use App\Entity\CustomerSuccess;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClientsRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ClientsRepository::class)
 * @ApiResource(
 * normalizationContext={
 *  "groups"={"clients_all"}
 * }
 * )
 */
class Clients
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"clients_read", "clients_all"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"clients_read", "clients_all"})
     */
    private $civilite;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"clients_read", "clients_all"})
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"clients_read", "clients_all"})
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
      * @Groups({"clients_read", "clients_all"})
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
    * @Groups({"clients_read", "clients_all"})
     */
    private $adresse;

    /** * @Groups({"clients_read", "clients_all"})
     * @ORM\Column(type="string", length=255)
     
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"clients_read", "clients_all"})
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"clients_read", "clients_all"})
     */
    private $Activite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
    * @Groups({"clients_read", "clients_all"})
     */
    private $siret;

    /**
     * @ORM\Column(type="string", length=255)
    * @Groups({"clients_read", "clients_all"})
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"clients_read", "clients_all"})
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"clients_read", "clients_all"})
     */
    private $dateDesactivation;

    /**
     * @ORM\OneToMany(targetEntity=Chemins::class, mappedBy="client")
     * @Groups({"clients_all"})
     */
    private $chemins;

    /**
     * @ORM\OneToMany(targetEntity=RendezVous::class, mappedBy="client")
     * 
     */
    private $rendezVouses;

    /**
     * @ORM\ManyToOne(targetEntity=CustomerSuccess::class, inversedBy="clients")
      * @Groups({"clients_read", "clients_all"})
     */
    private $customerSuccess;

    /**
     * @ORM\OneToOne(targetEntity=Users::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"clients_read", "clients_all"})
     */
    private $user;

    public function __construct()
    {
        $this->chemins = new ArrayCollection();
        $this->rendezVouses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCivilite(): ?string
    {
        return $this->civilite;
    }

    public function setCivilite(string $civilite): self
    {
        $this->civilite = $civilite;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getActivite(): ?string
    {
        return $this->Activite;
    }

    public function setActivite(string $Activite): self
    {
        $this->Activite = $Activite;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(\DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateDesactivation(): ?\DateTimeInterface
    {
        return $this->dateDesactivation;
    }

    public function setDateDesactivation(?\DateTimeInterface $dateDesactivation): self
    {
        $this->dateDesactivation = $dateDesactivation;

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
            $chemin->setClient($this);
        }

        return $this;
    }

    public function removeChemin(Chemins $chemin): self
    {
        if ($this->chemins->removeElement($chemin)) {
            // set the owning side to null (unless already changed)
            if ($chemin->getClient() === $this) {
                $chemin->setClient(null);
            }
        }

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
            $rendezVouse->setClient($this);
        }

        return $this;
    }

    public function removeRendezVouse(RendezVous $rendezVouse): self
    {
        if ($this->rendezVouses->removeElement($rendezVouse)) {
            // set the owning side to null (unless already changed)
            if ($rendezVouse->getClient() === $this) {
                $rendezVouse->setClient(null);
            }
        }

        return $this;
    }

    public function getCustomerSuccess(): ?CustomerSuccess
    {
        return $this->customerSuccess;
    }

    public function setCustomerSuccess(?CustomerSuccess $customerSuccess): self
    {
        $this->customerSuccess = $customerSuccess;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(Users $user): self
    {
        $this->user = $user;

        return $this;
    }
}
