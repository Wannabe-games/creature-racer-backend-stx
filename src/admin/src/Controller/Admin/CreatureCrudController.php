<?php

namespace App\Controller\Admin;

use App\Entity\Creature\Creature;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CreatureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Creature::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('name'),
            TextField::new('type'),
            NumberField::new('tier'),
            NumberField::new('cohort'),
            NumberField::new('accelerationMin')->onlyOnForms(),
            NumberField::new('accelerationMax')->onlyOnForms(),
            NumberField::new('bellyMax')->onlyOnForms(),
            NumberField::new('boostAccelerationMin')->onlyOnForms(),
            NumberField::new('boostAccelerationMax')->onlyOnForms(),
            NumberField::new('boostTimeMin')->onlyOnForms(),
            NumberField::new('boostTimeMax')->onlyOnForms(),
            NumberField::new('boostVelocityMin')->onlyOnForms(),
            NumberField::new('boostVelocityMax')->onlyOnForms(),
            NumberField::new('buttocksMax')->onlyOnForms(),
            NumberField::new('heartMax')->onlyOnForms(),
            NumberField::new('lungsMax')->onlyOnForms(),
            NumberField::new('musclesMax')->onlyOnForms(),
            NumberField::new('speedMin')->onlyOnForms(),
            NumberField::new('speedMax')->onlyOnForms(),
        ];
    }
}
