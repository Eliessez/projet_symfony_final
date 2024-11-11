<?php

namespace App\Service ;

use App\Repository\AnnonceRepository;

class NumeroAnnonceGenerator
{
    private $annonceRepository;

    public function __construct(AnnonceRepository $annonceRepository)
    {
        $this->annonceRepository = $annonceRepository;
    }

    public function generateUniqueNumeroAnnonce(): string
    {
        do {
            $numeroAnnonce = $this->generateNumeroAnnonce();
        } while ($this->annonceRepository->findOneBy(['numeroAnnonce' => $numeroAnnonce]));

        return $numeroAnnonce;
    }

    private function generateNumeroAnnonce(): string
    {
        $lettres = "CMD";
        $chiffres = str_pad(mt_rand(0, 999999999), 9, '0', STR_PAD_LEFT);
        return $lettres . '-' . $chiffres;
    }
}