<?php

namespace App\Enum;

enum ObjetType: string
{
    case PRODUITS_ALIMENTAIRES = 'produits_alimentaires';
    case VETEMENTS_TEXTILES = 'vetements_textiles';
    case ELECTRONIQUE_ELECTROMENAGER = 'electronique_electromenager';
    case MEUBLES_DECORATION = 'meubles_decoration';
    case LIVRES_PAPETERIE = 'livres_papeterie';
    case COSMETIQUES_HYGIENE = 'cosmetiques_hygiene';
    case JOUETS_LOISIRS = 'jouets_loisirs';

    case BOIS_DERIVES = 'bois_derives';
    case METAUX = 'metaux';
    case MATERIAUX_CONSTRUCTION = 'materiaux_construction';
    case BRIQUES_TUILES_CARRELAGES = 'briques_tuiles_carrelages';
    case ISOLANTS_TOITURE = 'isolants_toiture';
    case PEINTURES_REVETEMENTS = 'peintures_revetements';

    case MACHINES_OUTILS = 'machines_outils';
    case PIECES_DETACHEES = 'pieces_detachees';
    case EQUIPEMENTS_AGRICOLES = 'equipements_agricoles';
    case MATERIEL_CHANTIER = 'materiel_chantier';

    case CARBURANTS_LUBRIFIANTS = 'carburants_lubrifiants';
    case PRODUITS_CHIMIQUES = 'produits_chimiques';
    case GAZ_INDUSTRIELS = 'gaz_industriels';
    case DECHETS_DANGEREUX = 'dechets_dangereux';

    case VEHICULES = 'vehicules';
    case PNEUS = 'pneus';
    case PIECES_AUTOMOBILES = 'pieces_automobiles';

    case CEREALES_GRAINS = 'cereales_grains';
    case FRUITS_LEGUMES = 'fruits_legumes';
    case PRODUITS_LAITIERS = 'produits_laitiers';
    case BETAIL = 'betail';

    case EQUIPEMENTS_SPORTIFS = 'equipements_sportifs';
    case OEUVRES_ART_ANTIQUITES = 'oeuvres_art_antiquites';
    case INSTRUMENTS_MUSIQUE = 'instruments_musique';

    public function getLabel(): string
    {
        return match($this) {
            self::PRODUITS_ALIMENTAIRES => 'Produits alimentaires',
            self::VETEMENTS_TEXTILES => 'Vêtements et textiles',
            self::ELECTRONIQUE_ELECTROMENAGER => 'Électronique et électroménager',
            self::INSTRUMENTS_MUSIQUE => 'Instruments de musique',
        };
    }
}

//     public function getDescription(): string
//     {
//         return match($this) {
//             self::PRODUITS_ALIMENTAIRES => "Produits alimentaires (frais, surgelés, secs)",
//             self::VETEMENTS_TEXTILES => "Vêtements et textiles",
//             self::ELECTRONIQUE_ELECTROMENAGER => "Électronique et appareils ménagers",
//             self::MEUBLES_DECORATION => "Meubles et articles de décoration",
//             self::LIVRES_PAPETERIE => "Livres, papeterie et fournitures de bureau",
//             self::COSMETIQUES_HYGIENE => "Produits cosmétiques et d'hygiène",
//             self::JOUETS_LOISIRS => "Jouets et articles de loisirs",
//             self::BOIS_DERIVES => "Bois et produits dérivés",
//             self::METAUX => "Métaux (acier, aluminium, etc.)",
//             self::MATERIAUX_CONSTRUCTION => "Ciment, sable, gravier",
//             self::BRIQUES_TUILES_CARRELAGES => "Briques, tuiles, carrelages",
//             self::ISOLANTS_TOITURE => "Isolants et matériaux de toiture",
//             self::PEINTURES_REVETEMENTS => "Peintures et revêtements",
//             self::MACHINES_OUTILS => "Machines-outils",
//             self::PIECES_DETACHEES => "Pièces détachées et composants",
//             self::EQUIPEMENTS_AGRICOLES => "Équipements agricoles",
//             self::MATERIEL_CHANTIER => "Matériel de chantier",
//             self::CARBURANTS_LUBRIFIANTS => "Carburants et lubrifiants",
//             self::PRODUITS_CHIMIQUES => "Produits chimiques industriels",
//             self::GAZ_INDUSTRIELS => "Gaz industriels",
//             self::DECHETS_DANGEREUX => "Déchets dangereux (avec autorisation spéciale)",
//             self::VEHICULES => "Voitures neuves ou d'occasion",
//             self::PNEUS => "Pneus",
//             self::PIECES_AUTOMOBILES => "Pièces de rechange automobiles",
//             self::CEREALES_GRAINS => "Céréales et grains",
//             self::FRUITS_LEGUMES => "Fruits et légumes",
//             self::PRODUITS_LAITIERS => "Produits laitiers",
//             self::BETAIL => "Bétail (dans des camions spécialisés)",
//             self::EQUIPEMENTS_SPORTIFS => "Équipements sportifs (bateaux, motos, etc.)",
//             self::OEUVRES_ART_ANTIQUITES => "Œuvres d'art et antiquités",
//             self::INSTRUMENTS_MUSIQUE => "Instruments de musique (pianos, etc.)",
//         };
//     }
// }
