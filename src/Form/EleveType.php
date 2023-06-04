<?php

namespace App\Form;

use App\Entity\Eleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',  TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('prenom',  TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('mail',  TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('telephone',  TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('photo',  TextType::class, ['attr' => ['class' => 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
