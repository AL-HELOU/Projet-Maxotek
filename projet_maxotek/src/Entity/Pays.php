<?php

namespace App\Entity;

use App\Repository\PaysRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaysRepository::class)]
class Pays
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $pays_nom = null;

    #[ORM\OneToMany(mappedBy: 'fournis_pays', targetEntity: Fournisseur::class, orphanRemoval: true)]
    private Collection $fournisseurs;

    #[ORM\OneToMany(mappedBy: 'user_pays', targetEntity: User::class, orphanRemoval: true)]
    private Collection $users;

    public function __construct()
    {
        $this->fournisseurs = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaysNom(): ?string
    {
        return $this->pays_nom;
    }

    public function setPaysNom(string $pays_nom): static
    {
        $this->pays_nom = $pays_nom;

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
            $fournisseur->setFournisPays($this);
        }

        return $this;
    }

    public function removeFournisseur(Fournisseur $fournisseur): static
    {
        if ($this->fournisseurs->removeElement($fournisseur)) {
            // set the owning side to null (unless already changed)
            if ($fournisseur->getFournisPays() === $this) {
                $fournisseur->setFournisPays(null);
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
            $user->setUserPays($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getUserPays() === $this) {
                $user->setUserPays(null);
            }
        }

        return $this;
    }
}
