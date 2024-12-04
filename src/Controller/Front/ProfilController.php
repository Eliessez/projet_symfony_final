<?php

namespace App\Controller\Front;

use App\Repository\AnnonceRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Exception\AccessDeniedException ;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/front/profil', name: 'app_front_')]
#[IsGranted("ROLE_USER")]
class ProfilController extends AbstractController
{
    #[Route('/', name: 'profil')]
    public function index(UserRepository $userRepository , AnnonceRepository $annonceRepository , Security $security ): Response
    {
        $user = $security->getUser();

        if (!$user) {
            throw new AccessDeniedException('Vous devez être connecté pour accéder à cette page.');
        }
        $annonces = $annonceRepository->findByUser($user);

        return $this->render('front/profil/index.html.twig', [
            'user'=>$user,
            'annonces'=>$annonces
        ]);
    }
}
