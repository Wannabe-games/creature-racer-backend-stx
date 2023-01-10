<?php

namespace App\Controller\Admin;

use App\Admin\Field\RolesField;
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
            RolesField::new('roles')->setPermission(User::ROLE_SUPER_ADMIN),
            TextField::new('nick'),
            TextField::new('email'),
            TextField::new('wallet'),
            NumberField::new('player.gold')->setLabel('Gold')->hideWhenCreating(),
            NumberField::new('player.stacks')->setLabel('Stacks')->onlyOnIndex(),
            AssociationField::new('creatures'),
            DateTimeField::new('lastLogin')->onlyOnIndex(),
            DateTimeField::new('createdAt')->onlyOnIndex(),
            BooleanField::new('enabled'),
        ];
    }
}
