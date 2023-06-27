<?php

namespace App\Controller\Admin;

use App\Entity\ContractLog;
use App\Form\Field\DataField;
use App\Form\Field\TransactionHashField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContractLogCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContractLog::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateTimeField::new('createdAt'),
            TransactionHashField::new('id')->onlyOnDetail()->setLabel('Transaction id'),
            TextField::new('wallet'),
            IntegerField::new('blockHeight')->onlyOnDetail(),
            NumberField::new('fee')->onlyOnDetail(),
            TextField::new('contractName'),
            NumberField::new('contractVersion'),
            TextField::new('contractFunctionName'),
            TextField::new('status'),
            DataField::new('contractFunctionArgs')->onlyOnDetail(),
            DataField::new('events')->onlyOnDetail(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['createdAt' => 'DESC']);
    }

    public function configureActions(Actions $actions): Actions
    {
        return parent::configureActions($actions)
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ->remove(Crud::PAGE_INDEX, Action::DELETE);
    }
}
