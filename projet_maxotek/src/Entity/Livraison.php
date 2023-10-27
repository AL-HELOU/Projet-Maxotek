<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $livraison_date = null;

    #[ORM\Column(length: 50)]
    private ?string $livraison_livreur = null;

    #[ORM\ManyToOne(inversedBy: 'livraisons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $livraison_com = null;

    #[ORM\OneToMany(mappedBy: 'livraison', targetEntity: LivraisonInclut::class, orphanRemoval: true)]
    private Collection $livraisonIncluts;

    public function __construct()
    {
        $this->livraisonIncluts = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLivraisonDate(): ?\DateTimeImmutable
    {
        return $this->livraison_date;
    }

    public function setLivraisonDate(\DateTimeImmutable $livraison_date): static
    {
        $this->livraison_date = $livraison_date;

        return $this;
    }

    public function getLivraisonLivreur(): ?string
    {
        return $this->livraison_livreur;
    }

    public function setLivraisonLivreur(string $livraison_livreur): static
    {
        $this->livraison_livreur = $livraison_livreur;

        return $this;
    }

    public function getLivraisonCom(): ?Commande
    {
        return $this->livraison_com;
    }

    public function setLivraisonCom(?Commande $livraison_com): static
    {
        $this->livraison_com = $livraison_com;

        return $this;
    }

    /**
     * @return Collection<int, LivraisonInclut>
     */
    public function getLivraisonIncluts(): Collection
    {
        return $this->livraisonIncluts;
    }

    public function addLivraisonInclut(LivraisonInclut $livraisonInclut): static
    {
        if (!$this->livraisonIncluts->contains($livraisonInclut)) {
            $this->livraisonIncluts->add($livraisonInclut);
            $livraisonInclut->setLivraison($this);
        }

        return $this;
    }

    public function removeLivraisonInclut(LivraisonInclut $livraisonInclut): static
    {
        if ($this->livraisonIncluts->removeElement($livraisonInclut)) {
            // set the owning side to null (unless already changed)
            if ($livraisonInclut->getLivraison() === $this) {
                $livraisonInclut->setLivraison(null);
            }
        }

        return $this;
    }

}
