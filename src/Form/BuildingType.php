<?php

namespace App\Form;

use App\Entity\Building\Building;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BuildingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'title',
                TextType::class,
                [
                    'label' => 'Název budovy'
                ]
            )
            ->add(
                'city',
                TextType::class,
                [
                    'label' => 'Město'
                ]
            )
            ->add(
                'address',
                TextType::class,
                [
                    'label' => 'Adresa'
                ]
            )
            ->add(
                'descriptionNumber',
                NumberType::class,
                [
                    'label' => 'Číslo popisné'
                ]
            )
            ->add(
                'postZip',
                NumberType::class,
               [
                   'label' => 'PSČ'
               ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Building::class,
        ]);
    }
}
