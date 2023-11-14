<?php

namespace App\Entity;

use App\Repository\AdministrateurRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AdministrateurRepository::class)]
#[UniqueEntity(fields:"email", message:"{{ value }} est déjà utilisé !")]
class Administrateur implements UserInterface, PasswordAuthenticatedUserInterface
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
        minMessage: 'Votre Nom doit comporter au moins {{ 2 }} caractères',
        maxMessage: 'Votre Nom ne peut pas contenir plus de {{ 50 }} caractères',
    )]
    private ?string $admin_nom = null;

    
    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(
        message: 'Cette valeur ne doit pas être vide.',
    )]
    #[Assert\Length(min:2, max:50,
        minMessage: 'Votre Prenom doit comporter au moins {{ 2 }} caractères',
        maxMessage: 'Votre Prenom ne peut pas contenir plus de {{ 50 }} caractères',
    )]
    private ?string $admin_prenom = null;


    #[ORM\Column(length: 180, unique: true)]
    #[Assert\Email(
        message: 'L\'e-mail "{{ value }}" n\'est pas un e-mail valide.',
    )]
    private ?string $email = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column]
    private array $roles = [];



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdminNom(): ?string
    {
        return $this->admin_nom;
    }

    public function setAdminNom(string $admin_nom): static
    {
        $this->admin_nom = $admin_nom;

        return $this;
    }

    public function getAdminPrenom(): ?string
    {
        return $this->admin_prenom;
    }

    public function setAdminPrenom(string $admin_prenom): static
    {
        $this->admin_prenom = $admin_prenom;

        return $this;
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

}
