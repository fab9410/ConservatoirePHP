<?php

namespace App\Controller;

use App\Repository\ProfRepository;
use App\Repository\EleveRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EleveRepository $eleveRepository, ProfRepository $profRepository): Response
    {
        $nbEleve = count($eleveRepository->findAll());
        $nbProf= count($profRepository->findAll());
        return $this->render('home/index.html.twig', [
            'nbEleve' => $nbEleve,
            'nbEleve' => $nbProf,
        ]);
    }
}
