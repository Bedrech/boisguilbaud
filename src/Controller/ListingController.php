<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\ProductsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListingController extends AbstractController
{
    #[Route('/listing/{slug}', name: 'app_listing')]
    public function index(
        Category $category,
        ProductsRepository $productsRepository,
    ): Response
    {
        $types = [
            'bois-buche', 'allumage', 'elagage', 'granules', 'fagots', 'rognage-souche',
            'cuisson', 'four-a-pizza', 'brazero'
        ];
        
        $products = [];
        foreach ($types as $type) {
            $products[$type] = $productsRepository->findBy(['type' => $type]);
        }
        
        return $this->render('listing/' . $category->getSlug() . '.html.twig', [
            'products' => $products,
        ]);
    }
}