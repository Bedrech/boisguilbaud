<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Products;
use App\Entity\Services;
use App\Repository\ProductsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListingController extends AbstractController
{
    #[Route('/listing/{slug}', name: 'app_listing')]
    public function index(
        Category $category,
        Products $products,
        ProductsRepository $productsitems
    ): Response
    {
        return $this->render('listing/' . $category->getSlug() . '.html.twig', [
            'category' => $category,
            'products' => $products,
            'bois' => $productsitems->findBy(['type' => 'bois-buche']),
            'allumage' => $productsitems->findBy(['type' => 'allumage']),
            'elagage' => $productsitems->findBy(['type' => 'elagage']),
            'granules' => $productsitems->findBy(['type' => 'granules']),
            'fagots' => $productsitems->findBy(['type' => 'fagots']),
            'rognage' => $productsitems->findBy(['type' => 'rognage-souche']),
            'cuisson' => $productsitems->findBy(['type' => 'cuisson']),
            'pizza' => $productsitems->findBy(['type' => 'four-a-pizza']),
            'brazero' => $productsitems->findBy(['type' => 'brazero']),
        ]);
    }

    #[Route('/bois-buches', name: 'app_bois_buches')]
    public function boisBuches(ProductsRepository $productsRepository): Response
    {
        $bois = $productsRepository->findBy(['type' => 'bois-buche']);

        return $this->render('listing/bois-buches.html.twig', [
            'bois' => $bois,
        ]);
    }

    #[Route('/allumage', name: 'app_allumage')]
    public function allumage(ProductsRepository $productsRepository): Response
    {
        $allumage = $productsRepository->findBy(['type' => 'allumage']);

        return $this->render('listing/allumage.html.twig', [
            'allumage' => $allumage,
        ]);
    }
    
    #[Route('/elagage', name: 'app_elagage')]
    public function elagage(ProductsRepository $productsRepository): Response
    {
        $elagage = $productsRepository->findBy(['type' => 'elagage']);

        return $this->render('listing/elagage.html.twig', [
            'elagage' => $elagage,
        ]);
    }

    #[Route('/granules', name: 'app_granules')]
    public function granules(ProductsRepository $productsRepository): Response
    {
        $granules = $productsRepository->findBy(['type' => 'granules']);

        return $this->render('listing/granules-de-bois.html.twig', [
            'granules' => $granules,
        ]);
    }

    #[Route('/fagots', name: 'app_fagots')]
    public function fagots(ProductsRepository $productsRepository): Response
    {
        $fagots = $productsRepository->findBy(['type' => 'fagots']);

        return $this->render('listing/fagots.html.twig', [
            'fagots' => $fagots,
        ]);
    }
    
    #[Route('/rognage', name: 'app_rognage')]
    public function rognage(ProductsRepository $productsRepository): Response
    {
        $rognage = $productsRepository->findBy(['type' => 'rognage-souche']);

        return $this->render('listing/rognage.html.twig', [
            'rognage' => $rognage,
        ]);
    }

    #[Route('/cuisson', name: 'app_cuisson')]
    public function cuissonBuches(ProductsRepository $productsRepository): Response
    {
        $cuisson = $productsRepository->findBy(['type' => 'cuisson']);

        return $this->render('listing/cuisson.html.twig', [
            'cuisson' => $cuisson,
        ]);
    }

    #[Route('/pizza', name: 'app_pizza')]
    public function pizza(ProductsRepository $productsRepository): Response
    {
        $pizza = $productsRepository->findBy(['type' => 'four-a-pizza']);

        return $this->render('listing/bois-buches.html.twig', [
            'pizza' => $pizza,
        ]);
    }

    #[Route('/brazero', name: 'app_brazero')]
    public function brazero(ProductsRepository $productsRepository): Response
    {
        $brazero = $productsRepository->findBy(['type' => 'brazero']);

        return $this->render('listing/brazero.html.twig', [
            'brazero' => $brazero,
        ]);
    }
}
