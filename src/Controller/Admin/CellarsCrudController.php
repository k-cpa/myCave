<?php

namespace App\Controller\Admin;

use App\Entity\Cellars;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CellarsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cellars::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('user', 'Propriétaire'),
            AssociationField::new('bottles', 'Les bouteilles'),
        ];
    }

}
