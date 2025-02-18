<?php

namespace App\Controller\Admin;

use App\Entity\Bottles;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BottlesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bottles::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('cellar', 'Propriétaire'),
            TextField::new('name', 'Nom de la bouteille'),
            TextareaField::new('description', 'Description'),
            IntegerField::new('year', 'Année'),
            AssociationField::new('grapes', 'Cépages')
                ->setFormTypeOptions([
                    'by_reference' => false,
                    'multiple' => true,
                ])
                ->autocomplete(),
            AssociationField::new('regions', 'Région')
                ->setFormTypeOptions([
                    'choice_label' => 'name',
                    'multiple' => false,
                ]),
            ImageField::new('imageName', 'image')
                ->setBasePath('uploads/images/')
                ->setUploadDir('public/uploads/images/')
                ->setRequired(false) // Permet de ne pas upload une nouvelle image systématiquement
        ];
    }
}


