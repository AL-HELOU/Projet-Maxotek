<?php

namespace App\Entity;

use App\Repository\ModePaiementRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: ModePaiementRepository::class)]
class ModePaiement
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
        minMessage: 'Le libelle du paiement doit comporter au moins {{ 2 }} caractères',
        maxMessage: 'Le libelle du paiement ne peut pas contenir plus de {{ 50 }} caractères',
    )]
    #[Assert\Regex(
        pattern: "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð][a-zA-Z\dàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
        message: '-- Format incorrect -- Format accepté : d\'abord au moins une lettre et ensuite (des lettres ou des nombres ou les caractères spéciaux  (_ - , . \') ).',
    )]
    private ?string $paiement_libelle = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Length(min:2, max:50,
        minMessage: 'Le statut du paiement doit comporter au moins {{ 2 }} caractères',
        maxMessage: 'Le statut du paiement ne peut pas contenir plus de {{ 50 }} caractères',
    )]
    #[Assert\Regex(
        pattern: "/^[a-zA-Z\dàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
        message: '-- Format incorrect -- Format accepté : (des lettres ou des nombres ou les caractères spéciaux  (_ - , . \') ).',
    )]
    private ?string $paiement_statut = null;

    #[ORM\Column]
    #[Assert\DateTime(
        message: 'Cette valeur n\'est pas une date valide.',
    )]
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
