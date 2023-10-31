<?php

namespace App\Entity;

use App\Repository\FacturationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: FacturationRepository::class)]
class Facturation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    #[Assert\Date(
        message: 'Cette valeur n\'est pas une date valide.',
    )]
    private ?\DateTimeImmutable $facture_date = null;

    #[ORM\ManyToOne(inversedBy: 'facturations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresse $facture_adresse = null;

    #[ORM\ManyToOne(inversedBy: 'facturations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $facture_com = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFactureDate(): ?\DateTimeImmutable
    {
        return $this->facture_date;
    }

    public function setFactureDate(\DateTimeImmutable $facture_date): static
    {
        $this->facture_date = $facture_date;

        return $this;
    }

    public function getFactureAdresse(): ?Adresse
    {
        return $this->facture_adresse;
    }

    public function setFactureAdresse(?Adresse $facture_adresse): static
    {
        $this->facture_adresse = $facture_adresse;

        return $this;
    }

    public function getFactureCom(): ?Commande
    {
        return $this->facture_com;
    }

    public function setFactureCom(?Commande $facture_com): static
    {
        $this->facture_com = $facture_com;

        return $this;
    }

}
