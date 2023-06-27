<?php

namespace App\Form\Field\Configurator;

use App\Common\Service\Stacks\ProviderManager;
use App\Form\Field\TransactionHashField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldConfiguratorInterface;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\FieldDto;
use Symfony\Component\DependencyInjection\ContainerInterface;

final class TransactionHashConfigurator implements FieldConfiguratorInterface
{
    public function __construct(
        private ContainerInterface $container,
        private ProviderManager $providerManager
    ) {
    }

    public function supports(FieldDto $field, EntityDto $entityDto): bool
    {
        return TransactionHashField::class === $field->getFieldFqcn();
    }

    public function configure(FieldDto $field, EntityDto $entityDto, AdminContext $context): void
    {
        if (!$field->getValue()) {
            return;
        }

        $url = 'https://explorer.hiro.so/txid/' . $field->getValue();

        if ($this->container->getParameter('chain_provider_url')) {
            $url .= '?chain=testnet&api=' . urlencode($this->container->getParameter('chain_provider_url'));
        }

        $field->setFormattedValue(sprintf("<a href=\"%s\" target=\"_blank\" title=\"Click to view in explorer.\">%s</a> (status: %s)", $url, $field->getValue(), $this->providerManager->getTransactionStatus($field->getValue())));
    }
}
