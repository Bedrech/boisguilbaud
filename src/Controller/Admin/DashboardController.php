<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Category;
use App\Entity\Changers;
use App\Entity\Products;
use App\Entity\Services;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(ProductsCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Boisguilbaud - Administration');           
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home'),
            MenuItem::linkToRoute('Retour au site', 'fa fa-home', 'main_index'),
            
            MenuItem::section('Gestion des catégories'),
            MenuItem::linkToCrud('Catégories', 'fas fa-list', Category::class),
                MenuItem::linkToCrud('Services', 'fas fa-list', Services::class),       
            
            MenuItem::section('Gestion des produits'),
                MenuItem::linkToCrud('Produits', 'fas fa-list', Products::class),
            
            MenuItem::section('Gestion des changers'),
                MenuItem::linkToCrud('Changers', 'fas fa-list', Changers::class),
            
            MenuItem::section('Gestion des utilisateurs'),
                MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class),
        ];
    }

    public function configureAssets(): Assets
    {
        return Assets::new()
            ->addCssFile('css/admin.css');
    }
}
