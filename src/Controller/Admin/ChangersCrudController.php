<?php

namespace App\Controller\Admin;

use App\Entity\Changers;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChangersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Changers::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Administration des Changers')
        ->setPageTitle('new', 'Créer un nouveau changer')
        ->setPageTitle('edit', 'Modifier un changer');
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->setLabel('ID')->hideOnForm(),
            IntegerField::new('annee')->setLabel("Années"),
            IntegerField::new('livraisons')->setLabel("Livraisons"),
            IntegerField::new('chantier')->setLabel("Chantiers"),
            IntegerField::new('steres')->setLabel("Stères"),

        ];
    }
    
}
