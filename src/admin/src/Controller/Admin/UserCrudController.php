<?php

namespace App\Controller\Admin;

use App\Admin\Field\RolesField;
use App\Common\Service\User\Utils\PasswordUpdaterInterface;
use App\Entity\User;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public function __construct(
        private PasswordUpdaterInterface $passwordUpdater
    ) {
    }

    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            RolesField::new('roles')->setPermission(User::ROLE_SUPER_ADMIN),
            TextField::new('nick'),
            EmailField::new('email'),
            TextField::new('plainPassword')->setLabel('Password'),
            TextField::new('nick'),
            NumberField::new('player.gold')->setLabel('Gold')->hideWhenCreating(),
            NumberField::new('player.stacks')->setLabel('Stacks')->onlyOnIndex(),
            AssociationField::new('creatures'),
            TextField::new('wallet')->hideOnIndex(),
            TextField::new('publicKey')->hideOnIndex(),
            DateTimeField::new('lastLogin')->onlyOnIndex(),
            DateTimeField::new('createdAt')->onlyOnIndex(),
            BooleanField::new('enabled')->hideOnForm(),
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        /** @var User $entityInstance */
        $entityInstance->setUsername($entityInstance->getEmail());
        $entityInstance->setUsernameCanonical($entityInstance->getEmail());
        $entityInstance->setEmailCanonical($entityInstance->getEmail());
        $entityInstance->setEnabled(true);
        $entityInstance->setCreatedAt(new DateTime());
        $this->passwordUpdater->hashPassword($entityInstance);

        parent::persistEntity($entityManager, $entityInstance);
    }
}
