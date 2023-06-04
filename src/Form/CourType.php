<?php

namespace App\Form;

use DateTime;
use App\Entity\Cour;
use App\Entity\Prof;
use App\Entity\Eleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class CourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('dateDebut', DateTimeType ::class, ['attr' => ['class' => 'form-control']])
            ->add('dateFin', DateTimeType::class, ['attr' => ['class' => 'form-control']])
            ->add('niveau', IntegerType::class, ['attr' => ['class' => 'form-control']])
            ->add('prof', EntityType::class, ['class' => Prof::class,'choice_label' => 'email'])
            ->add('eleve', EntityType::class, ['class' => Eleve::class,'choice_label' => 'mail', 'multiple' => true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cour::class,
        ]);
    }
}
