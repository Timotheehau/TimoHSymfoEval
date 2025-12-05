<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ArticleRepository $articleRepository): Response
    {
        // Récupère les 4 derniers articles
        $latestArticles = $articleRepository->findBy([], ['id' => 'DESC'], 4);

        return $this->render('home/index.html.twig', [
            'latestArticles' => $latestArticles,
        ]);
    }

    #[Route('/test', name: 'test')]
    public function test(): Response
    {
        return new Response('Controller chargé !');
    }
}
