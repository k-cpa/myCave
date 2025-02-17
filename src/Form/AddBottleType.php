<?php

namespace App\Form;

use App\Entity\Bottles;
use App\Entity\Grapes;
use App\Entity\Regions;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class AddBottleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
            ->add('name')
            ->add('description')
            ->add('year')
            ->add('imageFile', FileType::class, [
                'label' => 'Parcourir',
                'attr' => ['class' => 'hidden_inputFile'],
                'required' => true,
                'mapped' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => ['image/jpeg', 'image/png', 'image/gif'],
                        'mimeTypesMessage' => 'Veuillez télécharger une image au format valide (JPEG, PNG, GIF).',
                    ])
                ],
            ])
            ->add('grapes', EntityType::class, [
                'label' => 'Cépages',
                'class' => Grapes::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => false,
                'placeholder' => 'Sélectionnez les cépages.',
            ])
            ->add('regions', EntityType::class, [
                'class' => Regions::class,
                'choice_label' => 'name',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Ajouter à ma cave',
                'attr' => ['class' => 'submit_btn'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bottles::class,
        ]);
    }
}
