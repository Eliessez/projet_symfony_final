<?php

namespace App\Factory;

use App\Entity\Vehicule;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Vehicule>
 */
final class VehiculeFactory extends PersistentProxyObjectFactory
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
        return Vehicule::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'immatriculation' => self::faker()->randomElements(['AX-345-LQ','BF-123-AZ','AQ-345-BV','AZ-567-CD','ZE-234-AS','AQ-456-BG','AQ-870-BG']),
            'marque_camion' => self::faker()->randomElements(['Citroên','Bmw','Audi','Mercedes','Iveco']),
            'taille_camion' => self::faker()->randomElements(['4-6 m³','6-10 m³','10-14 m³','20-23 m³','30-40 m³']),
            'type_camion' => self::faker()->randomElements(['Petit utilitaire ','Fourgonnette ','Fourgon','Grand fourgon','Petit camion','Camion porteur']),
            'carburant' => self::faker()->randomElements(['Diesel','Essence','Electrique','Hybride']),


        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Vehicule $vehicule): void {})
        ;
    }
}
