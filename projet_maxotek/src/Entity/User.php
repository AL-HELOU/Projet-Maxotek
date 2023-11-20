<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Adresse;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;



#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields:"email", message:"{{ value }} est déjà utilisé !")]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\Email(
        message: 'L\'e-mail "{{ value }}" n\'est pas un e-mail valide.',
    )]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Length(min:2, max:50,
        minMessage: 'Votre Nom doit comporter au moins {{ 2 }} caractères',
        maxMessage: 'Votre Nom ne peut pas contenir plus de {{ 50 }} caractères',
    )]
    #[Assert\Regex(
        pattern: "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð][a-zA-Z\dàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
        message: '-- Format incorrect -- Format accepté : d\'abord au moins une lettre et ensuite (des lettres ou des nombres ou les caractères spéciaux  (_ - , . \') ).',
    )]
    private ?string $user_nom = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Length(min:2, max:50,
        minMessage: 'Votre Prenom doit comporter au moins {{ 2 }} caractères',
        maxMessage: 'Votre Prenom ne peut pas contenir plus de {{ 50 }} caractères',
    )]
    #[Assert\Regex(
        pattern: "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð][a-zA-Z\dàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u",
        message: '-- Format incorrect -- Format accepté : d\'abord au moins une lettre et ensuite (des lettres ou des nombres ou les caractères spéciaux  (_ - , . \') ).',
    )]
    private ?string $user_prenom = null;

    #[ORM\Column(length: 1)]
    #[Assert\Choice(['h', 'f', 'H', 'F'])]
    private ?string $user_sexe = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Length(min:2, max:50,
        minMessage: 'Votre Numéro de téléphone doit comporter au moins {{ 8 }} caractères',
        maxMessage: 'Votre Numéro de téléphone ne peut pas contenir plus de {{ 15 }} caractères',
    )]
    #[Assert\Type(
        type: 'integer',
        message: 'Le numéro du téléphone doit  être composée de (entre 8 et 15 chiffres.)',
    )]
    private ?string $user_tel = null;

    #[ORM\Column(length: 30)]
    #[Assert\Choice(['Particulier', 'Professionnel'])]
    private ?string $user_type = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Adresse $user_adresse = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Pays $user_pays = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commercial $user_commerc = null;

    #[ORM\OneToMany(mappedBy: 'com_user', targetEntity: Commande::class, orphanRemoval: true)]
    private Collection $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUserNom(): ?string
    {
        return $this->user_nom;
    }

    public function setUserNom(string $user_nom): static
    {
        $this->user_nom = $user_nom;

        return $this;
    }

    public function getUserPrenom(): ?string
    {
        return $this->user_prenom;
    }

    public function setUserPrenom(string $user_prenom): static
    {
        $this->user_prenom = $user_prenom;

        return $this;
    }

    public function getUserSexe(): ?string
    {
        return $this->user_sexe;
    }

    public function setUserSexe(string $user_sexe): static
    {
        $this->user_sexe = $user_sexe;

        return $this;
    }

    public function getUserTel(): ?string
    {
        return $this->user_tel;
    }

    public function setUserTel(string $user_tel): static
    {
        $this->user_tel = $user_tel;

        return $this;
    }

    public function getUserType(): ?string
    {
        return $this->user_type;
    }

    public function setUserType(string $user_type): static
    {
        $this->user_type = $user_type;

        return $this;
    }

    public function getUserAdresse(): ?Adresse
    {
        return $this->user_adresse;
    }

    public function setUserAdresse(?Adresse $user_adresse): static
    {
        $this->user_adresse = $user_adresse;

        return $this;
    }

    public function getUserPays(): ?Pays
    {
        return $this->user_pays;
    }

    public function setUserPays(?Pays $user_pays): static
    {
        $this->user_pays = $user_pays;

        return $this;
    }

    public function getUserCommerc(): ?Commercial
    {
        return $this->user_commerc;
    }

    public function setUserCommerc(?Commercial $user_commerc): static
    {
        $this->user_commerc = $user_commerc;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setComUser($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getComUser() === $this) {
                $commande->setComUser(null);
            }
        }

        return $this;
    }
}
