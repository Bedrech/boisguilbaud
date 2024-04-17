<?php

namespace App\Controller;

use App\Repository\ChangersRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PrestationController extends AbstractController
{
    #[Route('/prestation', name: 'app_prestation')]
    public function index(ChangersRepository $changers): Response
    {
        return $this->render('prestation/index.html.twig', [
            'changers' => $changers->findAll(),
        ]);
    }
}
