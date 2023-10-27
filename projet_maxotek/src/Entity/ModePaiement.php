<?php

namespace App\Entity;

use App\Repository\ModePaiementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModePaiementRepository::class)]
class ModePaiement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $paiement_libelle = null;

    #[ORM\Column(length: 50)]
    private ?string $paiement_statut = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $paiement_date = null;

    public function __construct()
    {
        $this->paiement_date = new \DateTimeImmutable();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPaiementLibelle(): ?string
    {
        return $this->paiement_libelle;
    }

    public function setPaiementLibelle(string $paiement_libelle): static
    {
        $this->paiement_libelle = $paiement_libelle;

        return $this;
    }

    public function getPaiementStatut(): ?string
    {
        return $this->paiement_statut;
    }

    public function setPaiementStatut(string $paiement_statut): static
    {
        $this->paiement_statut = $paiement_statut;

        return $this;
    }

    public function getPaiementDate(): ?\DateTimeImmutable
    {
        return $this->paiement_date;
    }

    public function setPaiementDate(\DateTimeImmutable $paiement_date): static
    {
        $this->paiement_date = $paiement_date;

        return $this;
    }
}
