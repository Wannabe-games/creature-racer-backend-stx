<?php

namespace App\Controller\Admin;

use App\Entity\ReferralNft;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReferralNftCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ReferralNft::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('refCode'),
            TextField::new('hash'),
            TextField::new('rNftId'),
            BooleanField::new('special'),
            AssociationField::new('owner'),
            AssociationField::new('users'),
            DateTimeField::new('nftExpiryDate'),
        ];
    }
}
