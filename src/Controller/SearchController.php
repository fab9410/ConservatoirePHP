<?php

namespace App\Controller;

use App\Repository\CourRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(Request $request, CourRepository $courRepository): Response
    {
        $message = "";
        $cours = [];
        if ($request->isMethod('POST')) {
            $dateD = $request->get('dateD');
            $cours = $courRepository->findCoursByDate($dateD);
        if (count($cours) == 0) {
            $message = 'Aucun cours pour le ' .$dateD;
        } 
        }

        return $this->render('search/index.html.twig', [
            'cours' => $cours,
            'message' => $message,
        ]);
    }
}
