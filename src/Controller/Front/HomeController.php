<?php

namespace App\Controller\Front;

use App\Entity\Annonce;
use App\Form\SupportType;
use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'app_home_')]
class HomeController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(AnnonceRepository $annonceRepository): Response
    {
        return $this->render('front/home/index.html.twig',['annonces'=>$annonceRepository->findAll()]);
    }

    #[Route('comment-ca-marche', name:'ccm')]
    public function index_ccm():Response
    {
        return $this->render('front/home/index_ccm.html.twig');
    }

    #[Route('devenir-partenaire', name:'dpt')]
    public function index_dpt():Response
    {
        return $this->render('front/home/index_dpt.html.twig');
    }
    #[Route('support', name:'support')]
    public function index_support(Request $request):Response
    {
        $form = $this->createForm(SupportType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->addFlash('success','Votre message a bien été envoyé . Nous allons vous recontacter au plus vite ');
        }
        return $this->render('front/home/support.html.twig',[
            'form'=>$form
        ]);
    }
}
