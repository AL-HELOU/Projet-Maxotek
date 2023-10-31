<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    #[Assert\Date(
        message: 'Cette valeur n\'est pas une date valide.',
    )]
    private ?\DateTimeImmutable $com_date = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Length(min:2, max:50,
        minMessage: 'Le statut de la commande doit comporter au moins {{ 2 }} caractères',
        maxMessage: 'Le statut de la commande ne peut pas contenir plus de {{ 50 }} caractères',
    )]
    private ?string $com_statut = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Length(min:2, max:50,
        minMessage: 'L\'adresse doit comporter au moins {{ 2 }} caractères',
        maxMessage: 'L\'adresse ne peut pas contenir plus de {{ 50 }} caractères',
    )]
    private ?Adresse $com_adresse = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?ModePaiement $com_paiement = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $com_user = null;

    #[ORM\OneToMany(mappedBy: 'livraison_com', targetEntity: Livraison::class, orphanRemoval: true)]
    private Collection $livraisons;

    #[ORM\OneToMany(mappedBy: 'ligcom_com', targetEntity: LigneCommande::class, orphanRemoval: true)]
    private Collection $ligneCommandes;

    #[ORM\OneToMany(mappedBy: 'facture_com', targetEntity: Facturation::class, orphanRemoval: true)]
    private Collection $facturations;


    public function __construct()
    {
        $this->livraisons = new ArrayCollection();
        $this->ligneCommandes = new ArrayCollection();
        $this->facturations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getComDate(): ?\DateTimeImmutable
    {
        return $this->com_date;
    }

    public function setComDate(\DateTimeImmutable $com_date): static
    {
        $this->com_date = $com_date;

        return $this;
    }

    public function getComStatut(): ?string
    {
        return $this->com_statut;
    }

    public function setComStatut(string $com_statut): static
    {
        $this->com_statut = $com_statut;

        return $this;
    }

    public function getComAdresse(): ?Adresse
    {
        return $this->com_adresse;
    }

    public function setComAdresse(?Adresse $com_adresse): static
    {
        $this->com_adresse = $com_adresse;

        return $this;
    }

    public function getComPaiement(): ?ModePaiement
    {
        return $this->com_paiement;
    }

    public function setComPaiement(?ModePaiement $com_paiement): static
    {
        $this->com_paiement = $com_paiement;

        return $this;
    }

    public function getComUser(): ?User
    {
        return $this->com_user;
    }

    public function setComUser(?User $com_user): static
    {
        $this->com_user = $com_user;

        return $this;
    }

    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }

    public function addLivraison(Livraison $livraison): static
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons->add($livraison);
            $livraison->setLivraisonCom($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): static
    {
        if ($this->livraisons->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getLivraisonCom() === $this) {
                $livraison->setLivraisonCom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LigneCommande>
     */
    public function getLigneCommandes(): Collection
    {
        return $this->ligneCommandes;
    }

    public function addLigneCommande(LigneCommande $ligneCommande): static
    {
        if (!$this->ligneCommandes->contains($ligneCommande)) {
            $this->ligneCommandes->add($ligneCommande);
            $ligneCommande->setLigcomCom($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): static
    {
        if ($this->ligneCommandes->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getLigcomCom() === $this) {
                $ligneCommande->setLigcomCom(null);
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
            $facturation->setFactureCom($this);
        }

        return $this;
    }

    public function removeFacturation(Facturation $facturation): static
    {
        if ($this->facturations->removeElement($facturation)) {
            // set the owning side to null (unless already changed)
            if ($facturation->getFactureCom() === $this) {
                $facturation->setFactureCom(null);
            }
        }

        return $this;
    }

}
