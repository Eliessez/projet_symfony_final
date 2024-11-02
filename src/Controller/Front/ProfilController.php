<?php

namespace App\Controller\Front;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/front/profil', name: 'app_front_')]
class ProfilController extends AbstractController
{
    #[Route('/', name: 'profil')]
    public function index(): Response
    {
        return $this->render('front/profil/index.html.twig', [
            'controller_name' => 'ProfilController',
        ]);
    }
}
