<?php

namespace App\Controller\Admin;

use App\Entity\Products;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
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
    $fields = [
    ];

    // Personnalisation pour la page de CRUD
    if ($pageName == Crud::PAGE_INDEX) {
        return [
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
            TextareaField::new('premierelongueur')->setLabel("Première<br>longueur"),
            TextareaField::new('deuxiemelongueur')->setLabel("Deuxieme<br>longueur"),
            TextareaField::new('troisiemelongueur')->setLabel("Troisième<br>longueur"),
            ChoiceField::new('surplace')->setChoices([
                'Oui' => 'Sur place',
                'Non' => ' ',
            ]),
            ChoiceField::new('livraison')->setChoices([
                'Oui' => 'Livraison',
                'Non' => ' ',
            ]),
            IntegerField::new('surplacepremierprix')->setLabel("Prix<br>premier<br>surplace"),
            IntegerField::new('surplacedeuxiemeprix')->setLabel("Prix<br>deuxieme<br>surplace"),
            IntegerField::new('surplacetroisiemeprix')->setLabel('Prix<br>troisième<br>surplace'),
            IntegerField::new('livraisonpremierprix')->setLabel("Prix<br>premier<br>livraison"),
            IntegerField::new('livraisondeuxiemeprix')->setLabel("Prix<br>deuxieme<br>livraison"),
            IntegerField::new('livraisontroisiemeprix')->setLabel("Prix<br>troisième<br>livraison"),
        ];
    }
    

    // Personnalisation pour la page de création
    if ($pageName == Crud::PAGE_NEW) {
        return [
            IdField::new('id')->setLabel('ID')->hideOnForm(),
            TextField::new('name')->setLabel("Nom"),
            ChoiceField::new('type')->setLabel("Type")->setChoices([
                'Bois bûches' => 'bois-buche',
                'Granulés de bois' => 'granules-de-bois',
                'Allumage' => 'allumage',
                'Cuisson' => 'cuisson',
                'Four a Pizza' => 'four-a-pizza',
                'Brazero' => 'brazero',
            ]),
            ImageField::new('imageName')->setLabel("Image")->setUploadDir('public/images/items/')->onlyOnForms(),
            TextareaField::new('description'),
            TextareaField::new('premierelongueur')->setLabel("Première longueur"),
            TextareaField::new('deuxiemelongueur')->setLabel("Deuxieme longueur"),
            TextareaField::new('troisiemelongueur')->setLabel("Troisième longueur"),
            ChoiceField::new('surplace')->setChoices([
                'Oui' => 'Sur place',
                'Non' => ' ',
            ]),
            ChoiceField::new('livraison')->setChoices([
                'Oui' => 'Livraison',
                'Non' => ' ',
            ]),
            IntegerField::new('surplacepremierprix')->setLabel("Prix premier surplace"),
            IntegerField::new('surplacedeuxiemeprix')->setLabel("Prix deuxieme surplace"),
            IntegerField::new('surplacetroisiemeprix')->setLabel('Prix troisième surplace'),
            IntegerField::new('livraisonpremierprix')->setLabel("Prix premier livraison"),
            IntegerField::new('livraisondeuxiemeprix')->setLabel("Prix deuxieme livraison"),
            IntegerField::new('livraisontroisiemeprix')->setLabel("Prix troisième livraison"),
        ];
    }

    // Personnalisation pour la page de création
    if ($pageName == Crud::PAGE_EDIT) {
        return [
            IdField::new('id')->setLabel('ID')->hideOnForm(),
            TextField::new('name')->setLabel("Nom"),
            ChoiceField::new('type')->setLabel("Type")->setChoices([
                'Bois bûches' => 'bois-buche',
                'Granulés de bois' => 'granules-de-bois',
                'Allumage' => 'allumage',
                'Cuisson' => 'cuisson',
                'Four a Pizza' => 'four-a-pizza',
                'Brazero' => 'brazero',
            ]),
            ImageField::new('imageName')->setLabel("Image")->setUploadDir('public/images/items/')->onlyOnForms(),
            TextareaField::new('description'),
            TextareaField::new('premierelongueur')->setLabel("Première longueur"),
            TextareaField::new('deuxiemelongueur')->setLabel("Deuxieme longueur"),
            TextareaField::new('troisiemelongueur')->setLabel("Troisième longueur"),
            ChoiceField::new('surplace')->setChoices([
                'Oui' => 'Sur place',
                'Non' => ' ',
            ]),
            ChoiceField::new('livraison')->setChoices([
                'Oui' => 'Livraison',
                'Non' => ' ',
            ]),
            IntegerField::new('surplacepremierprix')->setLabel("Prix premier surplace"),
            IntegerField::new('surplacedeuxiemeprix')->setLabel("Prix deuxieme surplace"),
            IntegerField::new('surplacetroisiemeprix')->setLabel('Prix troisième surplace'),
            IntegerField::new('livraisonpremierprix')->setLabel("Prix premier livraison"),
            IntegerField::new('livraisondeuxiemeprix')->setLabel("Prix deuxieme livraison"),
            IntegerField::new('livraisontroisiemeprix')->setLabel("Prix troisième livraison"),
        ];
    }

    return $fields;
}    
}
