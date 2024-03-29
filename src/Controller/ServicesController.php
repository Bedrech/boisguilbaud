<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Products;
use App\Entity\Services;
use App\Repository\ProductsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServicesController extends AbstractController
{
    #[Route('/services/{slug}', name: 'app_services')]
    public function index(
        Services $services,
        Products $products,
        ProductsRepository $productsitems
    ): Response
    {
        return $this->render('services/' . $services->getSlug() . '.html.twig', [
            'services' => $services,
            'ramonage' => $productsitems->findBy(['type' => 'ramonage']),
            'elagage' => $productsitems->findBy(['type' => 'elagage']),
            'rognage' => $productsitems->findBy(['type' => 'rognage']),
        ]);
    }
}
