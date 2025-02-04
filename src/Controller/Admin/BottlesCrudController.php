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
            TextField::new('name'),
            TextareaField::new('description'),
            AssociationField::new('grapes', 'Cépages')
                ->setFormTypeOptions([
                    'by_reference' => false,
                    'multiple' => true,
                ])
                ->autocomplete(),
            IntegerField::new('image', 'image'),
            ImageField::new('image', 'image')
                ->setBasePath('uploads/images/')
                ->setUploadDir('public/uploads/images/')
        ];
    }
}
