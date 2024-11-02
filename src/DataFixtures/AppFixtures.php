<?php

namespace App\DataFixtures;

use App\Factory\AnnonceFactory;
use App\Factory\ProduitFactory;
use App\Factory\UserFactory;
use App\Factory\VehiculeFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        AnnonceFactory::createMany(20);
        ProduitFactory::createMany(20);
        UserFactory::createMany(20);
        VehiculeFactory::createMany(20);

        $manager->flush();
    }
}
