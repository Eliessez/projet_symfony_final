<?php

namespace App\Enum;

enum ObjetTaille : string
{
    case TRES_PETIT = "Moins de 30 cm dans sa plus grande dimension";
    case PETIT = "Entre 30 cm et 60 cm dans sa plus grande dimension";
    case MOYEN = "Entre 60 cm et 120 cm dans sa plus grande dimension"; 
    case GRAND = "Entre 120 cm et 200 cm dans sa plus grande dimension";
    case TRES_GRAND = "Entre 200 cm et 300 cm dans sa plus grande dimension";
    case HORS_NORME = "Plus de 300 cm dans sa plus grande dimension";

    // public function getDimensions(): string
    // {
    //     return match($this) {
    //         self::TRES_PETIT => "Moins de 30 cm dans sa plus grande dimension",
    //         self::PETIT => "Entre 30 cm et 60 cm dans sa plus grande dimension",
    //         self::MOYEN => "Entre 60 cm et 120 cm dans sa plus grande dimension",
    //         self::GRAND => "Entre 120 cm et 200 cm dans sa plus grande dimension",
    //         self::TRES_GRAND => "Entre 200 cm et 300 cm dans sa plus grande dimension",
    //         self::HORS_NORME => "Plus de 300 cm dans sa plus grande dimension",
    //     };
    // }

    // public function getExemples(): array
    // {
    //     return match($this) {
    //         self::TRES_PETIT => ["Livre", "Téléphone portable", "Petit appareil électronique"],
    //         self::PETIT => ["Micro-ondes", "Carton standard", "Petit meuble d'appoint"],
    //         self::MOYEN => ["Téléviseur", "Réfrigérateur", "Bureau"],
    //         self::GRAND => ["Canapé", "Armoire", "Grand électroménager"],
    //         self::TRES_GRAND => ["Piano droit", "Lit king size", "Grande bibliothèque"],
    //         self::HORS_NORME => ["Piano à queue", "Statue monumentale", "Équipement industriel"],
    //     };
    // }

    // public function getTypeTransport(): string
    // {
    //     return match($this) {
    //         self::TRES_PETIT => "Peut être expédié par colis postal standard",
    //         self::PETIT => "Livraison par petit utilitaire ou fourgonnette",
    //         self::MOYEN => "Nécessite un camion de taille moyenne",
    //         self::GRAND => "Transport par camion porteur",
    //         self::TRES_GRAND => "Requiert un semi-remorque ou un camion spécialisé",
    //         self::HORS_NORME => "Transport exceptionnel avec autorisation spéciale",
    //     };
    // }
    // public function toArray(): array
    // {
    //     return [
    //         'name' => $this->name,
    //         'dimensions' => $this->getDimensions(),
    //         'exemples' => $this->getExemples(),
    //         'typeTransport' => $this->getTypeTransport(),
    //     ];
    // }
//     public static function fromName(string $name): self
//     {
//         return self::tryFrom($name) ?? throw new \InvalidArgumentException("Invalid ObjetTaille name: $name");
//     }
}
