<?php

namespace App\Form;

use App\Entity\Louer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LouerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prix_semaine')
            ->add('nombre_semaines')
            ->add('dateDebutLocation')
            ->add('appartement')
            ->add('saison')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Louer::class,
        ]);
    }
}
