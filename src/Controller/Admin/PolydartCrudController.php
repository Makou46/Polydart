<?php

namespace App\Controller\Admin;

use App\Entity\Polydart;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PolydartCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Polydart::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
