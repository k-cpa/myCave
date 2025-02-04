<?php

namespace App\Form;

use App\Entity\Bottles;
use App\Entity\Cellars;
use App\Entity\Grapes;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddBottleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('year')
            ->add('image')
            ->add('cellar', EntityType::class, [
                'class' => Cellars::class,
                'choice_label' => 'id',
            ])
            ->add('grapes', EntityType::class, [
                'class' => Grapes::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bottles::class,
        ]);
    }
}
