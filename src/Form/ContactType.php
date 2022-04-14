<?php

namespace App\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname',TextType::class, [
                'required' => true])
            ->add('firstname', TextType::class, [
                'required' => true])
            ->add('email', TextType::class, [
                'required' => true])
            ->add('message', TextareaType::class, [
                'attr' => ['rows' => 6],
                'required' => true])

            ->add('subject', ChoiceType::class,[
                'choices' => [
                    new Subject('Je souhaite poser une réclamation'),
                    new Subject('Je souhaite commander un service supplémentaire'),
                    new Subject('Je souhaite en savoir plus sur une suite'),
                    new Subject('J\'ai un soucis avec cette application'),
                ]

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