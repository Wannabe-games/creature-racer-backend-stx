<?php

namespace App\Controller\Admin;

use App\Entity\Game\Lobby;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class LobbyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Lobby::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('uuid')->setLabel('Id')->onlyOnIndex(),
            NumberField::new('betAmount'),
            AssociationField::new('host'),
            TextField::new('hostPaymentId')->onlyOnForms(),
            TextField::new('hostRaceId')->onlyOnForms(),
            AssociationField::new('opponent'),
            TextField::new('opponentPaymentId')->onlyOnForms(),
            TextField::new('opponentRaceId')->onlyOnForms(),
            AssociationField::new('winner'),
            TextField::new('status')->onlyOnIndex(),
            DateTimeField::new('timeleft')->onlyOnIndex(),
            DateTimeField::new('createdAt')->onlyOnIndex(),
        ];
    }
}
