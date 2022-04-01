<?php

namespace App\Form;

use App\Entity\Establishments;
use App\Entity\Reservations;
use App\Entity\Suites;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SuitesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'required' => true
            ])
            ->add('cover', UrlType::class, [
                'required' => true
            ] )
            ->add('description', TextType::class, [
                'required' => true
            ])
            ->add('price', NumberType::class, [
                'required' => true
            ])

            ->add('is_reserved',CheckboxType::class, [
                'label' => 'Oui',
                'required' => true
    ])
            ->add('establishment', EntityType::class, [
                'class' => Establishments::class,
                'choice_label' => 'name',
                'required' => true,
                'mapped' => false,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Suites::class,
        ]);
    }
}
