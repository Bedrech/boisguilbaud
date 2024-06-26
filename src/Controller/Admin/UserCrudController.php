<?php

namespace App\Controller\Admin;

use App\Entity\User;
use Symfony\Bundle\SecurityBundle\Security;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Form\{FormBuilderInterface, FormEvent, FormEvents};
use EasyCorp\Bundle\EasyAdminBundle\Field\{IdField, EmailField, TextField};
use Symfony\Component\Form\Extension\Core\Type\{PasswordType, RepeatedType};
use EasyCorp\Bundle\EasyAdminBundle\Config\{Action, Actions, Crud, KeyValueStore};


class UserCrudController extends AbstractCrudController
{
    
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher,) {}

    public static function getEntityFqcn(): string
    {
        return User::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
          
        $fields = [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email'),
            ArrayField::new('roles'),
        ];

        $password = TextField::new('password')
            ->setFormType(RepeatedType::class)
            ->setFormTypeOptions([
                'type' => PasswordType::class,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => '(Répetez le mot de passe)'],
                'mapped' => false,
            ])
            ->setRequired($pageName === Crud::PAGE_NEW)
            ->onlyOnForms();
        $fields[] = $password;

        return $fields;
    }

    public function createNewFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        $formBuilder = parent::createNewFormBuilder($entityDto, $formOptions, $context);
        return $this->addPasswordEventListener($formBuilder);
    }

    public function createEditFormBuilder(EntityDto $entityDto, KeyValueStore $formOptions, AdminContext $context): FormBuilderInterface
    {
        $formBuilder = parent::createEditFormBuilder($entityDto, $formOptions, $context);
        return $this->addPasswordEventListener($formBuilder);
    }

    private function addPasswordEventListener(FormBuilderInterface $formBuilder): FormBuilderInterface
    {
        return $formBuilder->addEventListener(FormEvents::POST_SUBMIT, $this->hashPassword());
    }

    private function hashPassword()
    {
        return function (FormEvent $event) {
            $form = $event->getForm();
            $user = $form->getData();

            if (!$form->isValid()) {
                return;
            }

            $password = $form->get('password')->getData();
            if ($password === null) {
                return;
            }

            $hash = $this->userPasswordHasher->hashPassword($user, $password);
            $user->setPassword($hash);
        };
    }
}
