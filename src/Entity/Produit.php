<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\HasLifecycleCallbacks;
use Faker\Core\File;
use Symfony\Component\HttpFoundation\File\File as FileFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
#[HasLifecycleCallbacks]
#[Vich\Uploadable]

class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $type_objet = null;

    #[ORM\Column(length: 255)]
    private ?string $taille_objet = null;

    #[ORM\Column(nullable: true)]
    private ?bool $fragile = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $poid_objet = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping:'products',fileNameProperty:'image')]
    private ?File $imageFile = null ; 

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'produit')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Annonce $annonce = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTypeObjet(): ?string
    {
        return $this->type_objet;
    }

    public function setTypeObjet(string $type_objet): static
    {
        $this->type_objet = $type_objet;

        return $this;
    }

    public function getTailleObjet(): ?string
    {
        return $this->taille_objet;
    }

    public function setTailleObjet(string $taille_objet): static
    {
        $this->taille_objet = $taille_objet;

        return $this;
    }

    public function isFragile(): ?bool
    {
        return $this->fragile;
    }

    public function setFragile(?bool $fragile): static
    {
        $this->fragile = $fragile;

        return $this;
    }

    public function getPoidObjet(): ?string
    {
        return $this->poid_objet;
    }

    public function setPoidObjet(string $poid_objet): static
    {
        $this->poid_objet = $poid_objet;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): static
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get the value of imageFile
     */ 
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set the value of imageFile
     *
     * @return  self
     */ 
    public function setImageFile($imageFile)
    {
        $this->imageFile = $imageFile;

        return $this;
    }
}
