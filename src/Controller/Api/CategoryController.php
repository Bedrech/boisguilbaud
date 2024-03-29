<?php

namespace App\Controller\Api;

use App\Repository\CategoryRepository;
use App\Repository\ServicesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController {
    public function index(
        CategoryRepository $category,
        ServicesRepository $services
        ): Response 
    {
        return $this->render('_partials/_header.html.twig', [
            'categories' => $category->findAll(),
            'service' => $services->findAll()
        ]);
    }
}