<?php

namespace App\EntityListener ;

use App\Entity\Annonce;
use App\Repository\AnnonceRepository;
use App\Service\NumeroAnnonceGenerator;
use DateTimeImmutable;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs as EventLifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsEntityListener(event: Events::prePersist, entity: Annonce::class)]
#[AsEntityListener(event: Events::preUpdate, entity: Annonce::class)]
class AnnonceListener
{
    private $numeroAnnonceGenerator;
    private $slugger;
    private $annonceRepository;

    public function __construct(NumeroAnnonceGenerator $numeroAnnonceGenerator, SluggerInterface $slugger , AnnonceRepository $annonceRepository)
    {
        $this->annonceRepository = $annonceRepository;
        $this->numeroAnnonceGenerator = $numeroAnnonceGenerator;
        $this->slugger = $slugger;
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
        if(!$annonce->getDateValidation()){
            $annonce->setDateValidation(new \DateTimeImmutable('2000-01-01 00:00'));
        }

        $this->generateSlug($annonce);
    }
    public function preUpdate (Annonce $annonce){
        $this->generateSlug($annonce);
    }
    private function generateSlug(Annonce $annonce)
    {
      $slug=$this->slugger->slug($annonce->getTitre())->lower();
      $originalSlug = $slug;
      $counter = 1;

      while ($this->annonceRepository->findOneBy(['slug'=>$slug])) {
        $slug = $originalSlug . '-' . $counter;
        $counter++;
      }
      $annonce->setSlug($slug);

    }
}
