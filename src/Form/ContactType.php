<?php

namespace App\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('subject', ChoiceType::class,[
                'choices' => [
                    'Je souhaite poser une réclamation'=>'Je souhaite poser une réclamation',
                    'Je souhaite commander un service supplémentaire'=>'Je souhaite commander un service supplémentaire',
                    'Je souhaite en savoir plus sur une suite'=>'Je souhaite en savoir plus sur une suite',
                    'J\'ai un soucis avec cette application'=>'J\'ai un soucis avec cette application',
                ]

            ])
            ->add('message', TextareaType::class, [
                'attr' => ['rows' => 6],
                'required' => true])



        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }
}