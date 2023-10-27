<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $categ_libelle = null;

    #[ORM\Column(type: Types::BLOB)]
    private $categ_photo = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'sous_categ')]
    #[ORM\JoinColumn(nullable: false)]
    private ?self $sous_categ = null;

    #[ORM\OneToMany(mappedBy: 'produit_categ', targetEntity: Produit::class, orphanRemoval: true)]
    private Collection $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategLibelle(): ?string
    {
        return $this->categ_libelle;
    }

    public function setCategLibelle(string $categ_libelle): static
    {
        $this->categ_libelle = $categ_libelle;

        return $this;
    }

    public function getCategPhoto()
    {
        return $this->categ_photo;
    }

    public function setCategPhoto($categ_photo): static
    {
        $this->categ_photo = $categ_photo;

        return $this;
    }

    public function getSousCategId(): ?self
    {
        return $this->sous_categ;
    }

    public function setSousCategId(?self $sous_categ): static
    {
        $this->sous_categ = $sous_categ;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setProduitCateg($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getProduitCateg() === $this) {
                $produit->setProduitCateg(null);
            }
        }

        return $this;
    }
}
