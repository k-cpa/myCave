<?php

namespace App\Controller\Admin;

use App\Entity\Regions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RegionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Regions::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Régions'),
            AssociationField::new('country', 'Pays'),
        ];
    }

}
