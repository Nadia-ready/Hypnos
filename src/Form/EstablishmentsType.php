<?php

namespace App\Form;

use App\Entity\Establishments;
use App\Entity\Manager;
use App\Entity\Reservations;
use App\Entity\Suites;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EstablishmentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'required' => true])
            ->add('city', TextType::class, [
                'required' => true])
            ->add('address', TextType::class, [
                'required' => true])
            ->add('description', TextType::class, [
                'required' => true])
            ->add('reservations', EntityType::class, [
                'class' =>Reservations::class,
                'choice_label' => 'id',
                'mapped' =>false])
            ->add('suites', EntityType::class, [
                'class' => Suites::class,
                'choice_label' => function (Suites $suites) {
                    return $suites->getTitle();
                },
                'required' =>true,
                'multiple' => true
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Establishments::class,
        ]);
    }
}
