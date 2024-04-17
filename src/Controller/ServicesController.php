<?php

namespace App\Controller;

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
        ProductsRepository $productsRepository
    ): Response
    {
        $serviceTypes = ['ramonage', 'elagage', 'rognage'];
        $products = [];

        foreach ($serviceTypes as $type) {
            $products[$type] = $productsRepository->findBy(['type' => $type]);
        }

        return $this->render('services/' . $services->getSlug() . '.html.twig', [
            'services' => $services,
            'products' => $products,
        ]);
    }
}