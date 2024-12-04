<?php

namespace App\Controller\Front;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/annonce',name:'app_annonce_')]
class AnnonceController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(AnnonceRepository $annonceRepository , Request $request): Response
    {
        $pagination = $annonceRepository->paginateAnnonce($request->query->getInt('page',1));
        return $this->render('front/annonce/index.html.twig', [
            'annonces' => $annonceRepository->findAll(),
            'pagination'=>$pagination
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    #[IsGranted("ROLE_USER")]
    public function new(Request $request, EntityManagerInterface $entityManager , Security $security): Response
    {
        $user = $security->getUser();
        $annonce = new Annonce();
        $annonce->setUser($user);
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($annonce);
            $entityManager->flush();
            $this->addFlash('success','Votre annonce a bien été creer ');

            return $this->redirectToRoute('app_annonce_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('front/annonce/new.html.twig', [
            'annonce' => $annonce,
            'form' => $form,
        ]);
    }

    #[Route('/{slug}', name: 'show', methods: ['GET'])]
    public function show($slug, Annonce $annonce, AnnonceRepository $annonceRepository): Response
    {
        $annonce = $annonceRepository->findOneBy(['slug' => $slug]);
        if (!$annonce) {
            throw new NotFoundHttpException('Annonce non trouvée');
        }
        return $this->render('front/annonce/show.html.twig', [
            'annonce' => $annonce,
        ]);
    }

    #[Route('/{slug}/edit', name: 'edit', methods: ['GET', 'POST'])]
    #[IsGranted("ROLE_USER")]

    public function edit($slug ,Request $request, Annonce $annonce, EntityManagerInterface $entityManager,AnnonceRepository $annonceRepository): Response
    {
        $annonce = $annonceRepository->findOneBy(['slug' => $slug]);
        if (!$annonce) {
            throw new NotFoundHttpException('Annonce non trouvée');
        }
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success','Votre annonce a bien été modifiée ');


            return $this->redirectToRoute('app_annonce_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('front/annonce/edit.html.twig', [
            'annonce' => $annonce,
            'form' => $form,
        ]);
    }

    #[Route('/{slug}', name: 'delete', methods: ['POST'])]
    #[IsGranted("ROLE_USER")]

    public function delete($slug ,Request $request, Annonce $annonce, EntityManagerInterface $entityManager, AnnonceRepository $annonceRepository): Response
    {
        $annonce = $annonceRepository->findOneBy(['slug' => $slug]);
        if (!$annonce) {
            throw new NotFoundHttpException('Annonce non trouvée');
        }
        if ($this->isCsrfTokenValid('delete'.$annonce->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($annonce);
            $entityManager->flush();
            $this->addFlash('warning','Votre annonce a bien été supprimer');

        }

        return $this->redirectToRoute('app_annonce_index', [], Response::HTTP_SEE_OTHER);
    }
}
