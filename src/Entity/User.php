<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
#[UniqueEntity(fields: ['email'], message: 'Cet email est déjà utilisé .')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $name = '';

    #[ORM\Column(length: 255)]
    private ?string $firstName = '';

    #[ORM\Column(length: 255)]
    private ?string $adress = '';

    #[ORM\Column(nullable: true)]
    private ?int $siret_number = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $RCS = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $id_picture = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $kbis = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $head_office = null;

    #[ORM\Column]
    private bool $isVerified = false;

    /**
     * @var Collection<int, Annonce>
     */
    #[ORM\OneToMany(targetEntity: Annonce::class, mappedBy: 'user')]
    private Collection $annonces;

    /**
     * @var Collection<int, Annonce>
     */
    #[ORM\ManyToMany(targetEntity: Annonce::class, mappedBy: 'transporteur')]
    private Collection $annonces_postuler;

    public function __construct()
    {
        $this->annonces = new ArrayCollection();
        $this->annonces_postuler = new ArrayCollection();
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
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_PARTICULIER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getSiretNumber(): ?int
    {
        return $this->siret_number;
    }

    public function setSiretNumber(?int $siret_number): static
    {
        $this->siret_number = $siret_number;

        return $this;
    }

    public function getRCS(): ?string
    {
        return $this->RCS;
    }

    public function setRCS(?string $RCS): static
    {
        $this->RCS = $RCS;

        return $this;
    }

    public function getIdPicture(): ?string
    {
        return $this->id_picture;
    }

    public function setIdPicture(?string $id_picture): static
    {
        $this->id_picture = $id_picture;

        return $this;
    }

    public function getKbis(): ?string
    {
        return $this->kbis;
    }

    public function setKbis(?string $kbis): static
    {
        $this->kbis = $kbis;

        return $this;
    }

    public function getHeadOffice(): ?string
    {
        return $this->head_office;
    }

    public function setHeadOffice(?string $head_office): static
    {
        $this->head_office = $head_office;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection<int, Annonce>
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonce $annonce): static
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces->add($annonce);
            $annonce->setUser($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): static
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getUser() === $this) {
                $annonce->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Annonce>
     */
    public function getAnnoncesPostuler(): Collection
    {
        return $this->annonces_postuler;
    }

    public function addAnnoncesPostuler(Annonce $annoncesPostuler): static
    {
        if (!$this->annonces_postuler->contains($annoncesPostuler)) {
            $this->annonces_postuler->add($annoncesPostuler);
            $annoncesPostuler->addTransporteur($this);
        }

        return $this;
    }

    public function removeAnnoncesPostuler(Annonce $annoncesPostuler): static
    {
        if ($this->annonces_postuler->removeElement($annoncesPostuler)) {
            $annoncesPostuler->removeTransporteur($this);
        }

        return $this;
    }
}
