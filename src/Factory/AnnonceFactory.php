<?php

namespace App\Factory;

use App\Entity\Annonce;
use App\Enum\AnnonceStatut;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<Annonce>
 */
final class AnnonceFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct() {}

    public static function class(): string
    {
        return Annonce::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'titre' => self::faker('fr_FR')->word(),
            'description' => self::faker('fr_FR')->sentence(),
            'adresse_livraison' => self::faker('fr_FR')->address(),
            'adresse_reception' => self::faker('fr_FR')->address(),
            'createdAt' => \DateTimeImmutable::createFromMutable(self::faker()->dateTime('-1 week')),
            'date_livraison' => self::faker()->dateTimeBetween('-1 week', '+1 week'),
            'date_reception' => self::faker()->dateTimeBetween('-1 week', '+1 week'),
            'date_validation' => self::faker()->dateTimeBetween('-1 week', '+1 week'),
            'etat_commande' => [self::faker()->randomElement(AnnonceStatut::cases())->value],
            'numero_annonce' => 'CMD - ' . self::faker()->randomNumber(7, true),
            'prix' => self::faker()->randomFloat(1, 1, 500),
            'user' => UserFactory::new(),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Annonce $annonce): void {})
        ;
    }
}
