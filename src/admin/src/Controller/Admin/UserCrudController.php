<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('nick'),
            TextField::new('email'),
            TextField::new('wallet'),
            NumberField::new('player.softCurrency')->setLabel('Gold'),
            NumberField::new('player.hardCurrency')->setLabel('STX')->onlyOnIndex(),
            AssociationField::new('creatures'),
            DateTimeField::new('lastLogin')->onlyOnIndex(),
            DateTimeField::new('createdAt')->onlyOnIndex(),
            BooleanField::new('enabled'),
        ];
    }
}
