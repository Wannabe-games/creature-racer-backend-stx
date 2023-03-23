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
            IdField::new('id')->onlyOnIndex(),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('timeleft'),
            NumberField::new('betAmount')->setHelp('Enter a value in microstacks'),
            AssociationField::new('host'),
            TextField::new('hostPaymentId')->onlyOnForms(),
            TextField::new('hostRace')->onlyOnDetail(),
            AssociationField::new('opponent'),
            TextField::new('opponentPaymentId')->onlyOnForms(),
            TextField::new('opponentRace')->onlyOnDetail(),
            AssociationField::new('winner'),
            TextField::new('winnerWithdrawId')->onlyOnForms(),
            TextField::new('status')->onlyOnIndex(),
        ];
    }
}
