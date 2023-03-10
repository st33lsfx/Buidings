<?php

namespace App\Form\Person;

use App\Model\Person\PersonModel;
use App\Repository\Apartment\ApartmentRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'firstName',
                TextType::class,
                [
                    'label' => 'Jméno'
                ]
            )
            ->add(
                'lastName',
                TextType::class,
                [
                    'label' => 'Příjmení'
                ]
            )
            ->add(
                'email',
                TextType::class,
                [
                    'label' => 'Email',
                ]
            )
            ->add(
                'phone',
                TextType::class,
                [
                    'label' => 'Telefon',
                    'required' => false
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PersonModel::class,
        ]);
    }
}
