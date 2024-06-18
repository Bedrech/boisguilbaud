<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CartFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom', TextType::class, [
            'label' => false,
            'attr' => [
                'placeholder' => 'Votre nom',
                'class' => 'contactinput'
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Veuillez entrer votre nom'
                ]),
            ]
        ])

        ->add('email', EmailType::class, [
            'label' => false,
            'attr' => [
                'placeholder' => 'Votre email',
                'class' => 'contactinput'
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Veuillez entrer votre email'
                ]),
            ]
        ])

        ->add('telephone', TelType::class, [
            'label' => false,
            'attr' => [
                'placeholder' => 'Votre numéro de téléphone',
                'class' => 'contactinput'
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Veuillez entrer votre numéro de téléphone'
                ])
            ],
            new Regex([
                'pattern' => '/^[0-9]{10}$/',
                'message' => 'Le numéro de téléphone doit contenir 10 chiffres.'
            ])
        ])

        ->add('adresse', TextType::class, [
            'label' => false,
            'attr' => [
                'placeholder' => 'Adresse',
                'class' => 'contactinput'
            ],
        ])

        ->add('ville', TextType::class, [
            'label' => false,
            'attr' => [
                'placeholder' => 'Ville',
                'class' => 'contactinput'
            ],
        ])

        ->add('submit', SubmitType::class, [
            'label' => 'Commander',
            'attr' => [
                'class' => 'btn btn-primary'
            ]
        ])
                ;
    }
}
