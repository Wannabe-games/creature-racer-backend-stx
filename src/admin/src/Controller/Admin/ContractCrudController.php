<?php

namespace App\Controller\Admin;

use App\Entity\ContractLog;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContractCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContractLog::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('createdAt')->hideOnForm(),
            IdField::new('id')->onlyOnDetail()->setLabel('Transaction id'),
            TextField::new('wallet'),
            NumberField::new('fee')->onlyOnDetail(),
            TextField::new('contractName'),
            NumberField::new('contractVersion'),
            TextField::new('contractFunctionName'),
            CollectionField::new('contractFunctionArgs')->onlyOnDetail(),
            CollectionField::new('postConditions')->onlyOnDetail(),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ->remove(Crud::PAGE_INDEX, Action::DELETE);
    }
}
