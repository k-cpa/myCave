<?php

namespace App\Controller\Admin;

use App\Entity\Countries;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CountriesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Countries::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            ChoiceField::new('name', 'pays')
        ];
    }

}
