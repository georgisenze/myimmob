<?php

namespace App\Controller\Admin;

use App\Entity\Property; 
use App\Entity\Category;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class PropertyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Property::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextareaField::new('description'),
            ImageField::new('image')
                        ->setBasePath('uploads/')
                        ->setUploadDir('public/uploads')
                        ->setUploadedFileNamePattern('[randomhash].[extension]')
                        ->setRequired(false),
            IntegerField::new('surface'),
            IntegerField::new('rooms'),
            IntegerField::new('bedrooms'),
            IntegerField::new('floor'),
            IntegerField::new('heat'),
            MoneyField::new('price')->setCurrency("XOF"),
            CountryField::new('city'),
            TextField::new('address'),
            TextField::new('postal_code'),
            BooleanField::new('sold'),
            DateField::new('created_at'),
            //AssociationField::new('category')

        ];
    }
    
}
