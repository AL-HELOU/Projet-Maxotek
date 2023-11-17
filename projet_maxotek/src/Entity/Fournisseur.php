<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
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
        minMessage: 'Le Nom doit comporter au moins {{ 2 }} caractères',
        maxMessage: 'Le Nom ne peut pas contenir plus de {{ 50 }} caractères',
    )]
    #[Assert\Regex(
        pattern: "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð][a-zA-Z\dàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
        message: '-- Format incorrect -- Format accepté : d\'abord au moins une lettre et ensuite (des lettres ou des nombres ou les caractères spéciaux  (_ - , . \') ).',
    )]
    private ?string $fournis_nom = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Length(min:2, max:50,
        minMessage: 'Le Numéro de téléphone doit comporter au moins {{ 8 }} chiffres',
        maxMessage: 'Le Numéro de téléphone ne peut pas contenir plus de {{ 15 }} chiffres',
    )]
    #[Assert\Type(
        type: 'integer',
        message: 'Le numéro du téléphone doit  être composée de (entre 8 et 15 chiffres.)',
    )]
    private ?string $fournis_tel = null;

    #[ORM\Column(length: 100)]
    #[Assert\Email(
        message: 'L\'e-mail "{{ value }}" n\'est pas un e-mail valide.',
    )]
    private ?string $fournis_email = null;

    #[ORM\ManyToOne(inversedBy: 'fournisseurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresse $fournis_adresse = null;

    #[ORM\ManyToOne(inversedBy: 'fournisseurs')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pays $fournis_pays = null;

    #[ORM\OneToMany(mappedBy: 'produit_fournis', targetEntity: Produit::class, orphanRemoval: true)]
    private Collection $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFournisNom(): ?string
    {
        return $this->fournis_nom;
    }

    public function setFournisNom(string $fournis_nom): static
    {
        $this->fournis_nom = $fournis_nom;

        return $this;
    }

    public function getFournisTel(): ?string
    {
        return $this->fournis_tel;
    }

    public function setFournisTel(string $fournis_tel): static
    {
        $this->fournis_tel = $fournis_tel;

        return $this;
    }

    public function getFournisEmail(): ?string
    {
        return $this->fournis_email;
    }

    public function setFournisEmail(string $fournis_email): static
    {
        $this->fournis_email = $fournis_email;

        return $this;
    }


    public function getFournisAdresse(): ?Adresse
    {
        return $this->fournis_adresse;
    }

    public function setFournisAdresse(?Adresse $fournis_adresse): static
    {
        $this->fournis_adresse = $fournis_adresse;

        return $this;
    }

    public function getFournisPays(): ?Pays
    {
        return $this->fournis_pays;
    }

    public function setFournisPays(?Pays $fournis_pays): static
    {
        $this->fournis_pays = $fournis_pays;

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
            $produit->setProduitFournis($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getProduitFournis() === $this) {
                $produit->setProduitFournis(null);
            }
        }

        return $this;
    }

}
