<?php

namespace App\Controller\Admin;

use App\Entity\MessageContact;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MessageContactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MessageContact::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('nom'),
            TextField::new('prenom'),
            EmailField::new('email'),
            TelephoneField::new('telephone'),
            TextField::new('titre'),
            TextEditorField::new('message'),
            AssociationField::new('ContactType'),
        ];
    }
}
