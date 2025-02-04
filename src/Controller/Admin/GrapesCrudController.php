<?php

namespace App\Controller\Admin;

use App\Entity\Grapes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GrapesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Grapes::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Cépages')
        ];
    }

}
