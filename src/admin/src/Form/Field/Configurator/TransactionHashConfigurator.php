<?php

namespace App\Form\Field\Configurator;

use App\Common\Service\Stacks\ProviderManager;
use App\Form\Field\TransactionHashField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldConfiguratorInterface;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\FieldDto;

final class TransactionHashConfigurator implements FieldConfiguratorInterface
{
    public function __construct(
        private ProviderManager $providerManager
    ) {
    }

    public function supports(FieldDto $field, EntityDto $entityDto): bool
    {
        return TransactionHashField::class === $field->getFieldFqcn();
    }

    public function configure(FieldDto $field, EntityDto $entityDto, AdminContext $context): void
    {
        $field->setFormattedValue($field->getValue() ? $field->getValue() . ' (status: ' . $this->providerManager->getTransactionStatus($field->getValue()) . ')' : null);
    }
}
