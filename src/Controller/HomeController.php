<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/', name: 'app_home_')]
class HomeController extends AbstractController
{
    #[Route('', name: 'index')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }
    #[Route('home', name: 'home')]
    public function home()
    {
        return $this->render('home/home.html.twig');
    }
    #[Route('access', name: 'access')]
    public function access(UserRepository $userRepository ) 
    {
        return $this->render('home/access.html.twig');
    }
}
