<?php

namespace App\Form\Filter;

use App\Form\UserRolesType;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Dto\FieldDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\FilterDataDto;
use EasyCorp\Bundle\EasyAdminBundle\Filter\FilterTrait;
use EasyCorp\Bundle\EasyAdminBundle\Contracts\Filter\FilterInterface;

final class UserRolesFilter implements FilterInterface
{
    use FilterTrait;

    public static function new(string $propertyName, $label = null): self
    {
        return (new self())
            ->setFilterFqcn(__CLASS__)
            ->setProperty($propertyName)
            ->setLabel($label)
            ->setFormType(UserRolesType::class);
    }

    public function apply(
        QueryBuilder $queryBuilder,
        FilterDataDto $filterDataDto,
        ?FieldDto $fieldDto,
        EntityDto $entityDto
    ): void {
        $comparison = $filterDataDto->getComparison();
        $values = $filterDataDto->getValue();

        foreach ($values as $value) {
            if ($comparison == 'contains') {
                $queryBuilder->orWhere($queryBuilder->expr()->like('entity.roles', "'%" . $value . "%'"));
            } else {
                $queryBuilder->andWhere($queryBuilder->expr()->like('entity.roles', "'%" . $value . "%'"));
            }
        }
    }
}
