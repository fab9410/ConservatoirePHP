<?php

namespace App\Controller;

use App\Repository\EleveRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EleveRepository $eleveRepository): Response
    {
        $nbEleve = count($eleveRepository->findAll());
        return $this->render('home/index.html.twig', [
            'nbEleve' => $nbEleve,
        ]);
    }
}
