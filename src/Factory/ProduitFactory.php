<?php

namespace App\Factory;

use App\Entity\Produit;
use App\Enum\ObjetTaille;
use App\Enum\ObjetType;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

use function Zenstruck\Foundry\set;

/**
 * @extends PersistentProxyObjectFactory<Produit>
 */
final class ProduitFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return Produit::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'annonce' => AnnonceFactory::new(),
            'description' => self::faker('fr_FR')->sentence(),
            'nom' => self::faker('fr_FR')->text(100),
            'poid_objet' => self::faker()->randomFloat(1,1,500),
            'taille_objet' => self::faker()->randomElements(ObjetTaille::class),
            'type_objet' => self::faker()->randomElements(ObjetType::class),

        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Produit $produit): void {})
        ;
    }
}
