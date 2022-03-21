<?php

namespace App\Form;

use App\Entity\Suites;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SuitesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('cover')
            ->add('description')
            ->add('price')
            ->add('picture')
            ->add('is_reserved')
            ->add('establishment')
            ->add('reservations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Suites::class,
        ]);
    }
}
