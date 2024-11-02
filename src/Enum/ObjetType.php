<?php

namespace App\Enum;

enum ObjetType
{
    case PRODUITS_ALIMENTAIRES;
    case VETEMENTS_TEXTILES;
    case ELECTRONIQUE_ELECTROMENAGER;
    case MEUBLES_DECORATION;
    case LIVRES_PAPETERIE;
    case COSMETIQUES_HYGIENE;
    case JOUETS_LOISIRS;

    case BOIS_DERIVES;
    case METAUX;
    case MATERIAUX_CONSTRUCTION;
    case BRIQUES_TUILES_CARRELAGES;
    case ISOLANTS_TOITURE;
    case PEINTURES_REVETEMENTS;

    case MACHINES_OUTILS;
    case PIECES_DETACHEES;
    case EQUIPEMENTS_AGRICOLES;
    case MATERIEL_CHANTIER;

    case CARBURANTS_LUBRIFIANTS;
    case PRODUITS_CHIMIQUES;
    case GAZ_INDUSTRIELS;
    case DECHETS_DANGEREUX;

    case VEHICULES;
    case PNEUS;
    case PIECES_AUTOMOBILES;

    case CEREALES_GRAINS;
    case FRUITS_LEGUMES;
    case PRODUITS_LAITIERS;
    case BETAIL;

    case EQUIPEMENTS_SPORTIFS;
    case OEUVRES_ART_ANTIQUITES;
    case INSTRUMENTS_MUSIQUE;


    public function getDescription(): string
    {
        return match($this) {
            self::PRODUITS_ALIMENTAIRES => "Produits alimentaires (frais, surgelés, secs)",
            self::VETEMENTS_TEXTILES => "Vêtements et textiles",
            self::ELECTRONIQUE_ELECTROMENAGER => "Électronique et appareils ménagers",
            self::MEUBLES_DECORATION => "Meubles et articles de décoration",
            self::LIVRES_PAPETERIE => "Livres, papeterie et fournitures de bureau",
            self::COSMETIQUES_HYGIENE => "Produits cosmétiques et d'hygiène",
            self::JOUETS_LOISIRS => "Jouets et articles de loisirs",
            self::BOIS_DERIVES => "Bois et produits dérivés",
            self::METAUX => "Métaux (acier, aluminium, etc.)",
            self::MATERIAUX_CONSTRUCTION => "Ciment, sable, gravier",
            self::BRIQUES_TUILES_CARRELAGES => "Briques, tuiles, carrelages",
            self::ISOLANTS_TOITURE => "Isolants et matériaux de toiture",
            self::PEINTURES_REVETEMENTS => "Peintures et revêtements",
            self::MACHINES_OUTILS => "Machines-outils",
            self::PIECES_DETACHEES => "Pièces détachées et composants",
            self::EQUIPEMENTS_AGRICOLES => "Équipements agricoles",
            self::MATERIEL_CHANTIER => "Matériel de chantier",
            self::CARBURANTS_LUBRIFIANTS => "Carburants et lubrifiants",
            self::PRODUITS_CHIMIQUES => "Produits chimiques industriels",
            self::GAZ_INDUSTRIELS => "Gaz industriels",
            self::DECHETS_DANGEREUX => "Déchets dangereux (avec autorisation spéciale)",
            self::VEHICULES => "Voitures neuves ou d'occasion",
            self::PNEUS => "Pneus",
            self::PIECES_AUTOMOBILES => "Pièces de rechange automobiles",
            self::CEREALES_GRAINS => "Céréales et grains",
            self::FRUITS_LEGUMES => "Fruits et légumes",
            self::PRODUITS_LAITIERS => "Produits laitiers",
            self::BETAIL => "Bétail (dans des camions spécialisés)",
            self::EQUIPEMENTS_SPORTIFS => "Équipements sportifs (bateaux, motos, etc.)",
            self::OEUVRES_ART_ANTIQUITES => "Œuvres d'art et antiquités",
            self::INSTRUMENTS_MUSIQUE => "Instruments de musique (pianos, etc.)",
        };
    }
}
