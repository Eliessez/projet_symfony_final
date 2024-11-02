<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('numero_annonce')
            ->add('prix')
            ->add('adresse_reception')
            ->add('date_reception', null, [
                'widget' => 'single_text',
            ])
            ->add('adresse_livraison')
            ->add('date_livraison', null, [
                'widget' => 'single_text',
            ])
            ->add('image')
            // ->add('etat_commande')
            // ->add('date_validation', null, [
            //     'widget' => 'single_text',
            // ])
            // ->add('createdAt', null, [
            //     'widget' => 'single_text',
            // ])
            // ->add('User', EntityType::class, [
            //     'class' => User::class,
            //     'choice_label' => 'id',
            // ])
            // ->add('transporteur', EntityType::class, [
            //     'class' => User::class,
            //     'choice_label' => 'id',
            //     'multiple' => true,
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
