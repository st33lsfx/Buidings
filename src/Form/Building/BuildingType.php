<?php

namespace App\Form\Building;

use App\Model\Building\BuildingModel;
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
                    'label' => 'Město',
                    'required' => false
                ]
            )
            ->add(
                'address',
                TextType::class,
                [
                    'label' => 'Adresa',
                    'required' => false
                ]
            )
            ->add(
                'descriptionNumber',
                NumberType::class,
                [
                    'label' => 'Číslo popisné',
                    'required' => false
                ]
            )
            ->add(
                'postZip',
                TextType::class,
                [
                    'label' => 'PSČ',
                    'required' => false
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BuildingModel::class,
        ]);
    }
}
