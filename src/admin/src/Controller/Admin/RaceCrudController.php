<?php

namespace App\Controller\Admin;

use App\Entity\Game\Race;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;

class RaceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Race::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('finishedAt'),
            AssociationField::new('creatureUser')->setLabel('Creature'),
            AssociationField::new('lobby'),
            NumberField::new('score'),
        ];
    }
}
