<?php

namespace App\Controller\Admin;

use App\Entity\ReferralNft;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
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
            TextField::new('refCode')->hideWhenUpdating(),
            DateField::new('nftExpiryDate')->hideWhenUpdating(),
            AssociationField::new('owner')->hideWhenUpdating(),
            BooleanField::new('special')->renderAsSwitch(false)->hideWhenUpdating(),
            TextField::new('mintHash')->onlyOnDetail(),
            TextField::new('transferHash')->onlyOnDetail(),
            AssociationField::new('users')->setLabel('Used during registration')->onlyOnDetail(),
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        /** @var ReferralNft $entityInstance */
        $entityInstance->setNftExpiryDate($entityInstance->getNftExpiryDate()?->setTime(23, 59, 59));

        parent::persistEntity($entityManager, $entityInstance);
    }

    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
            ->remove(Crud::PAGE_INDEX, Action::EDIT);
    }
}
