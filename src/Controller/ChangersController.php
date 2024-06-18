<?php

namespace App\Controller;

use App\Repository\ChangersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ChangersController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
        ]);
    }
}
