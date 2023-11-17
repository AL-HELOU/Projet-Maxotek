<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Length(min:2, max:50,
        minMessage: 'Le libelle du produit doit comporter au moins {{ 2 }} caractères',
        maxMessage: 'Le libelle du produit ne peut pas contenir plus de {{ 50 }} caractères',
    )]
    #[Assert\Regex(
        pattern: "/^[a-zA-Z\dàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
        message: '-- Format incorrect -- Format accepté : (des lettres ou des nombres ou les caractères spéciaux  (_ - , . \') ).',
    )]
    private ?string $produit_libelle = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Regex(
        pattern: "/^[a-zA-Z\dàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
        message: '-- Format incorrect -- Format accepté : (des lettres ou des nombres ou les caractères spéciaux  (_ - , . \') ).',
    )]
    private ?string $produit_descrip = null;

    #[ORM\Column]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Positive(
        message: 'Cette valeur doit être positive.',
    )]
    private ?float $produit_prixachat = null;

    #[ORM\Column]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Positive(
        message: 'Cette valeur doit être positive.',
    )]
    private ?float $produit_prixht = null;

    #[ORM\Column(type: Types::BLOB)]
    private $produit_photo = null;

    #[ORM\Column]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Positive(
        message: 'Cette valeur doit être positive.',
    )]
    private ?int $produit_stock = null;

    #[ORM\Column]
    private ?bool $produit_active = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $produit_categ = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Fournisseur $produit_fournis = null;

    #[ORM\OneToMany(mappedBy: 'ligcom_produit', targetEntity: LigneCommande::class, orphanRemoval: true)]
    private Collection $ligneCommandes;


    public function __construct()
    {
        $this->ligneCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduitLibelle(): ?string
    {
        return $this->produit_libelle;
    }

    public function setProduitLibelle(string $produit_libelle): static
    {
        $this->produit_libelle = $produit_libelle;

        return $this;
    }

    public function getProduitDescrip(): ?string
    {
        return $this->produit_descrip;
    }

    public function setProduitDescrip(string $produit_descrip): static
    {
        $this->produit_descrip = $produit_descrip;

        return $this;
    }

    public function getProduitPrixachat(): ?float
    {
        return $this->produit_prixachat;
    }

    public function setProduitPrixachat(float $produit_prixachat): static
    {
        $this->produit_prixachat = $produit_prixachat;

        return $this;
    }

    public function getProduitPrixht(): ?float
    {
        return $this->produit_prixht;
    }

    public function setProduitPrixht(float $produit_prixht): static
    {
        $this->produit_prixht = $produit_prixht;

        return $this;
    }

    public function getProduitPhoto()
    {
        return $this->produit_photo;
    }

    public function setProduitPhoto($produit_photo): static
    {
        $this->produit_photo = $produit_photo;

        return $this;
    }

    public function getProduitStock(): ?int
    {
        return $this->produit_stock;
    }

    public function setProduitStock(int $produit_stock): static
    {
        $this->produit_stock = $produit_stock;

        return $this;
    }

    public function isProduitActive(): ?bool
    {
        return $this->produit_active;
    }

    public function setProduitActive(bool $produit_active): static
    {
        $this->produit_active = $produit_active;

        return $this;
    }

    public function getProduitCateg(): ?Categorie
    {
        return $this->produit_categ;
    }

    public function setProduitCateg(?Categorie $produit_categ): static
    {
        $this->produit_categ = $produit_categ;

        return $this;
    }

    public function getProduitFournis(): ?Fournisseur
    {
        return $this->produit_fournis;
    }

    public function setProduitFournis(?Fournisseur $produit_fournis): static
    {
        $this->produit_fournis = $produit_fournis;

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
            $ligneCommande->setLigcomProduit($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): static
    {
        if ($this->ligneCommandes->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getLigcomProduit() === $this) {
                $ligneCommande->setLigcomProduit(null);
            }
        }

        return $this;
    }

}
