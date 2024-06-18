<?php

namespace App\Controller;

use App\Repository\ChangersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(ChangersRepository $changers): Response
    {

        return $this->render('main/index.html.twig', [
            'changers' => $changers->findAll(),
        ]);
    }
}