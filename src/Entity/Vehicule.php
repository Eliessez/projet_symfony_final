<?php

namespace App\Entity;

use App\Repository\VehiculeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $marque_camion = null;

    #[ORM\Column(length: 255)]
    private ?string $type_camion = null;

    #[ORM\Column(length: 255)]
    private ?string $taille_camion = null;

    #[ORM\Column(length: 255)]
    private ?string $immatriculation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $carte_grise = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $carburant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarqueCamion(): ?string
    {
        return $this->marque_camion;
    }

    public function setMarqueCamion(string $marque_camion): static
    {
        $this->marque_camion = $marque_camion;

        return $this;
    }

    public function getTypeCamion(): ?string
    {
        return $this->type_camion;
    }

    public function setTypeCamion(string $type_camion): static
    {
        $this->type_camion = $type_camion;

        return $this;
    }

    public function getTailleCamion(): ?string
    {
        return $this->taille_camion;
    }

    public function setTailleCamion(string $taille_camion): static
    {
        $this->taille_camion = $taille_camion;

        return $this;
    }

    public function getImmatriculation(): ?string
    {
        return $this->immatriculation;
    }

    public function setImmatriculation(string $immatriculation): static
    {
        $this->immatriculation = $immatriculation;

        return $this;
    }

    public function getCarteGrise(): ?string
    {
        return $this->carte_grise;
    }

    public function setCarteGrise(?string $carte_grise): static
    {
        $this->carte_grise = $carte_grise;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(?string $carburant): static
    {
        $this->carburant = $carburant;

        return $this;
    }
}
