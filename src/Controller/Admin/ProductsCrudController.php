<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProductsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Products::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setPageTitle('index', 'Administration des Produits')
        ->setPageTitle('new', 'Créer un nouveau produit')
        ->setPageTitle('edit', 'Modifier un produit')
        ->setPaginatorPageSize(10);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id')->setLabel('ID')->hideOnForm(),
            TextField::new('name')->setLabel("Nom"),
            ChoiceField::new('type')->setLabel("Type")->setChoices([
                'Bois bûches' => 'bois-buche',
                'Granulés de bois' => 'granules-de-bois',
                'Allumage' => 'allumage',
                'Cuisson' => 'cuisson',
                'Four a Pizza' => 'four-a-pizza',
                'Brazero' => 'brazero',
            ]),
            TextareaField::new('description'),
            IntegerField::new('Premiere longueur')->setLabel("Première<br>longueur"),
            IntegerField::new('Deuxieme longueur')->setLabel("Deuxieme<br>longueur"),
            IntegerField::new('Troisieme longueur')->setLabel("Troisième<br>longueur"),
            ChoiceField::new('surplace')->setChoices([
                'Oui' => 'Sur place',
                'Non' => '',
            ]),
            ChoiceField::new('livraison')->setChoices([
                'Oui' => 'Livraison',
                'Non' => '',
            ]),
            IntegerField::new('surplacepremierprix')->setLabel("Prix<br>premier<br>surplace"),
            IntegerField::new('surplacedeuxiemeprix')->setLabel("Prix<br>deuxième<br>surplace"),
            IntegerField::new('surplacetroisiemeprix')->setLabel('Prix<br>troisième<br>surplace'),
            IntegerField::new('livraisonpremierprix')->setLabel("Prix<br>premier<br>livraison"),
            IntegerField::new('livraisondeuxiemeprix')->setLabel("Prix<br>deuxième<br>livraison"),
            IntegerField::new('livraisontroisiemeprix')->setLabel("Prix<br>troisième<br>livraison"),
        ];
    }
    
}
