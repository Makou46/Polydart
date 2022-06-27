<?php

namespace App\Controller\Admin;

use App\Entity\CustomPage;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CustomPageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CustomPage::class;
    }

    // public function configureFields(string $pageName): iterable
    // {
    //     return [
    //         TextField::new('title'),
    //         TextEditorField::new('content'),
    //         TextField::new('url'),
    //     ];
    // }
}
