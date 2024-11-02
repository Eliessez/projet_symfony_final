<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class SupportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,[
                'constraints'=>[new NotBlank()],
                'label'=>'Nom'
            ])
            ->add('firstName',TextType::class,[
                'label'=>'Prenom '
            ])
            ->add('email',EmailType::class,[
                'constraints'=>[new NotBlank()],
                'label'=>'Mot de passe'
            ])
            ->add('objet',TextType::class ,[
                'label'=>'Objet de la demande'
            ])
            ->add('message',TextareaType::class, [
                'constraints'=>[new NotBlank()],
                'label'=>'Entrez votre message'
            ])

        ;
    } 

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'=> null
        ]);
    }
}