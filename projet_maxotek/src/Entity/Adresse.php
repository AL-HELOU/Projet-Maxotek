<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 50)]
    private ?string $adresse_ville = null;

    #[ORM\Column(length: 5)]
    private ?string $adresse_cp = null;

    #[ORM\OneToMany(mappedBy: 'fournis_adresse', targetEntity: Fournisseur::class, orphanRemoval: true)]
    private Collection $fournisseurs;

    #[ORM\OneToMany(mappedBy: 'user_adresse', targetEntity: User::class, orphanRemoval: true)]
    private Collection $users;

    #[ORM\OneToMany(mappedBy: 'com_adresse', targetEntity: Commande::class, orphanRemoval: true)]
    private Collection $commandes;

    #[ORM\OneToMany(mappedBy: 'facture_adresse', targetEntity: Facturation::class, orphanRemoval: true)]
    private Collection $facturations;

    public function __construct()
    {
        $this->fournisseurs = new ArrayCollection();
        $this->users = new ArrayCollection();
        $this->commandes = new ArrayCollection();
        $this->facturations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getAdresseVille(): ?string
    {
        return $this->adresse_ville;
    }

    public function setAdresseVille(string $adresse_ville): static
    {
        $this->adresse_ville = $adresse_ville;

        return $this;
    }

    public function getAdresseCp(): ?string
    {
        return $this->adresse_cp;
    }

    public function setAdresseCp(string $adresse_cp): static
    {
        $this->adresse_cp = $adresse_cp;

        return $this;
    }

    /**
     * @return Collection<int, Fournisseur>
     */
    public function getFournisseurs(): Collection
    {
        return $this->fournisseurs;
    }

    public function addFournisseur(Fournisseur $fournisseur): static
    {
        if (!$this->fournisseurs->contains($fournisseur)) {
            $this->fournisseurs->add($fournisseur);
            $fournisseur->setFournisAdresse($this);
        }

        return $this;
    }

    public function removeFournisseur(Fournisseur $fournisseur): static
    {
        if ($this->fournisseurs->removeElement($fournisseur)) {
            // set the owning side to null (unless already changed)
            if ($fournisseur->getFournisAdresse() === $this) {
                $fournisseur->setFournisAdresse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setUserAdresse($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getUserAdresse() === $this) {
                $user->setUserAdresse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setComAdresse($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getComAdresse() === $this) {
                $commande->setComAdresse(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Facturation>
     */
    public function getFacturations(): Collection
    {
        return $this->facturations;
    }

    public function addFacturation(Facturation $facturation): static
    {
        if (!$this->facturations->contains($facturation)) {
            $this->facturations->add($facturation);
            $facturation->setFactureAdresse($this);
        }

        return $this;
    }

    public function removeFacturation(Facturation $facturation): static
    {
        if ($this->facturations->removeElement($facturation)) {
            // set the owning side to null (unless already changed)
            if ($facturation->getFactureAdresse() === $this) {
                $facturation->setFactureAdresse(null);
            }
        }

        return $this;
    }
}