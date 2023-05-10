<?php

namespace App\Controller\Admin;

use App\Common\Enum\CreatureLevels;
use App\Common\Enum\CreatureUpgradeTypes;
use App\Entity\Creature\CreatureLevel;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\ChoiceFilter;

class CreatureLevelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CreatureLevel::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            AssociationField::new('creature'),
            ChoiceField::new('level')->setChoices(CreatureLevels::getUpgradeLevels()),
            ChoiceField::new('upgradeType')->setChoices(CreatureUpgradeTypes::getUpgradeTypes()),
            AssociationField::new('upgradeChanges'),
            NumberField::new('priceGold'),
            NumberField::new('priceUSD'),
            NumberField::new('priceStacks')->hideOnForm(),
            NumberField::new('deliveryPriceStacks'),
            NumberField::new('deliveryWaitingTime'),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('creature')
            ->add(ChoiceFilter::new('level')->setChoices(CreatureLevels::getUpgradeLevels()))
            ->add(ChoiceFilter::new('upgradeType')->setChoices(CreatureUpgradeTypes::getUpgradeTypes()));
    }
}
