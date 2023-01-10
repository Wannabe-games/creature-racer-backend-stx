<?php

namespace App\Admin\Field;

use App\Entity\User;
use App\Form\RolesType;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Field\FieldInterface;
use EasyCorp\Bundle\EasyAdminBundle\Field\FieldTrait;

final class RolesField implements FieldInterface
{
    use FieldTrait;

    public static function new(string $propertyName, ?string $label = null): self
    {
        return (new self())
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setFormType(RolesType::class)
            ->setTemplateName('crud/field/array')
            ->addCssClass('field-map')
            ->formatValue(
                static function (array $value) {
                    $roles = array_flip(User::getRolesChoices());
                    $value = array_filter(
                        $value,
                        static function ($val) use ($roles) {
                            return isset($roles[$val]);
                        }
                    );
                    return implode(', ', array_map(static fn($v) => $roles[$v], $value));
                }
            );
    }
}
