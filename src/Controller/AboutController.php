<?php 
// src/Controller/AboutController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AboutController extends AbstractController
{
    #[Route('/about', name: 'about')]
    public function index(): Response
    {
        $info = [
            'service' => 'MonProjet est une application Symfony permettant de gérer facilement des articles, avec recherche, création et édition pour les administrateurs.',
            'author'  => 'Je suis Timon, étudiant en développement web, passionné par Symfony et le développement d’applications web modernes.',
            'goal'    => 'L’objectif de ce projet est de fournir une interface simple et intuitive pour gérer des contenus tout en explorant les bonnes pratiques Symfony.',
        ];

        return $this->render('about/index.html.twig', [
            'info' => $info,
        ]);
    }
}
