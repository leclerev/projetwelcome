<?php

namespace App\Form;

use App\Entity\Good;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GoodCreationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeGood')
            ->add('typePropertie')
            ->add('description')
            ->add('numPeople')
            ->add('hasGarden')
            ->add('hasGarage')
            ->add('hasTerrace')
            ->add('address')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Good::class,
        ]);
    }
}
