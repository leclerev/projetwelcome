<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('street1',  TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('street2',  TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('zipCode',  null, ['attr' => ['class' => 'form-control']])
            ->add('city',  TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('country',  TextType::class, ['attr' => ['class' => 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
