<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EspaceVertController extends AbstractController
{
    #[Route('/espace/vert', name: 'app_espace_vert')]
    public function index(): Response
    {
        return $this->render('espace_vert/index.html.twig', [
            'controller_name' => 'EspaceVertController',
        ]);
    }
}
