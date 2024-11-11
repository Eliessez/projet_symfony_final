<?php

namespace App\EntityListener ;

use App\Entity\Annonce;
use App\Service\NumeroAnnonceGenerator;
use DateTimeImmutable;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs as EventLifecycleEventArgs;

#[AsEntityListener(event: Events::prePersist, entity: Annonce::class)]
class AnnonceListener
{
    private $numeroAnnonceGenerator;

    public function __construct(NumeroAnnonceGenerator $numeroAnnonceGenerator)
    {
        $this->numeroAnnonceGenerator = $numeroAnnonceGenerator;
    }

    public function prePersist(Annonce $annonce, EventLifecycleEventArgs $event): void
    {
        if (!$annonce->getNumeroAnnonce()) {
            $numeroAnnonce = $this->numeroAnnonceGenerator->generateUniqueNumeroAnnonce();
            $annonce->setNumeroAnnonce($numeroAnnonce);
        }

        if (!$annonce->getCreatedAt()) {
            $annonce->setCreatedAt(new \DateTimeImmutable);
        }
    }
}