<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\User;
use App\Enum\AnnonceStatut;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('titre', TextType::class, [
            'constraints' => [
                new Assert\NotBlank(),
                new Assert\Length(['min' => 3, 'max' => 255])
            ]
        ])
        ->add('description', TextareaType::class, [
            'constraints' => [
                new Assert\NotBlank(),
                new Assert\Length(['min' => 10])
            ]
        ])
        ->add('prix', MoneyType::class, [
            'constraints' => [
                new Assert\NotBlank(),
                new Assert\Positive()
            ]
        ])
        ->add('adresse_reception', TextType::class, [
            'constraints' => [new Assert\NotBlank()]
        ])
        ->add('date_reception', DateType::class, [
            'widget' => 'single_text',
            'constraints' => [new Assert\NotBlank()]
        ])
        ->add('adresse_livraison', TextType::class, [
            'constraints' => [new Assert\NotBlank()]
        ])
        ->add('date_livraison', DateType::class, [
            'widget' => 'single_text',
            'constraints' => [new Assert\NotBlank()]
        ])
        ->add('imageFile', FileType::class, [
            'required' => false,
            'constraints' => [
                new Assert\File([
                    'mimeTypes' => [
                        'image/jpeg',
                        'image/png',
                    ],
                    'mimeTypesMessage' => 'Veuillez télécharger une image valide',
                ])
            ]
        ])
        // ->add('etat_commande', EnumType::class, [
        //     'class' => AnnonceStatut::class,
        //     'constraints' => [new Assert\NotBlank()]
        // ])
        // ->add('date_validation', DateTimeType::class, [
        //     'widget' => 'single_text',
        //     'required' => false
        // ])
        // ->add('User', EntityType::class, [
        //     'class' => User::class,
        //     'choice_label' => 'email',
        //     'constraints' => [new Assert\NotBlank()]
        // ])
        // ->add('transporteur', EntityType::class, [
        //     'class' => User::class,
        //     'choice_label' => 'email',
        //     'multiple' => true,
        //     'required' => false
        // ])
    ;
}

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Annonce::class,
        ]);
    }

}