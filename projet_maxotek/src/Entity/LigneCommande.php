<?php

namespace App\Entity;

use App\Repository\LigneCommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: LigneCommandeRepository::class)]
class LigneCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Positive(
        message: 'Cette valeur doit être positive.',
    )]
    private ?int $ligcom_quantite = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Positive(
        message: 'Cette valeur doit être positive.',
    )]
    private ?string $ligcom_prixunitaire = null;

    #[ORM\ManyToOne(inversedBy: 'ligneCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $ligcom_produit = null;

    #[ORM\ManyToOne(inversedBy: 'ligneCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $ligcom_com = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLigcomQuantite(): ?int
    {
        return $this->ligcom_quantite;
    }

    public function setLigcomQuantite(int $ligcom_quantite): static
    {
        $this->ligcom_quantite = $ligcom_quantite;

        return $this;
    }

    public function getLigcomPrixunitaire(): ?string
    {
        return $this->ligcom_prixunitaire;
    }

    public function setLigcomPrixunitaire(string $ligcom_prixunitaire): static
    {
        $this->ligcom_prixunitaire = $ligcom_prixunitaire;

        return $this;
    }

    public function getLigcomProduit(): ?Produit
    {
        return $this->ligcom_produit;
    }

    public function setLigcomProduit(?Produit $ligcom_produit): static
    {
        $this->ligcom_produit = $ligcom_produit;

        return $this;
    }

    public function getLigcomCom(): ?Commande
    {
        return $this->ligcom_com;
    }

    public function setLigcomCom(?Commande $ligcom_com): static
    {
        $this->ligcom_com = $ligcom_com;

        return $this;
    }
}
