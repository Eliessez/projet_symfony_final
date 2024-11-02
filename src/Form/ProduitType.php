<?php

namespace App\Form;

use App\Entity\Annonce;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('type_objet')
            ->add('taille_objet')
            ->add('fragile')
            ->add('poid_objet')
            // ->add('image')
            ->add('imageFile', FileType::class, [
                'label' => 'Téléchargez une image',
                'required' => false,
            ])
            ->add('description')
            ->add('annonce', EntityType::class, [
                'class' => Annonce::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
