<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/articles', name: 'app_articles')]
class ArticlesController extends AbstractController
{
    #[Route('/{slug}', name: 'articles.index', methods: ['GET'])]
    public function index(
        ArticlesRepository $articles,
         string $slug
         ): Response
    {
        // On trouve l'article par son slug
        $article = $articles->findOneBy(['slug' => $slug]);
        
        // On redirige vers la page d'article
        return $this->render('listing/' . $slug . '.html.twig', [
            'article' => $article,
        ]);
    }
}
