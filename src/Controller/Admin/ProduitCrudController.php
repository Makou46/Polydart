<?php

namespace App\Controller\Admin;

use App\Entity\Produit;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            IntegerField::new('quantite'),
            TextEditorField::new('description'),
            IntegerField::new('prix'),
            TextareaField::new('imageFile')
            ->setFormType(VichImageType::class),
            BooleanField::new('active')
            ->renderAsSwitch(true)
            ->setLabel('active'),
            AssociationField::new('category'),
            AssociationField::new('serie'),
        ];
    }
}
