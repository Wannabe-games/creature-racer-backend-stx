<?php

namespace App\Controller\Admin;

use App\Entity\Creature\Creature;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Game\Lobby;
use App\Entity\Game\Race;
use App\Entity\ReferralNft;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends AbstractDashboardController
{
    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::section('Users'),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
            MenuItem::linkToCrud('Creatures', 'fa fa-paw', Creature::class),
            MenuItem::linkToCrud('Price list', 'fa fa-money-bill', CreatureLevel::class),
            MenuItem::linkToCrud('Races', 'fa fa-flag-checkered', Race::class),
            MenuItem::linkToCrud('Lobbies', 'fa fa-scale-balanced', Lobby::class),
            MenuItem::linkToCrud('Referral NFT', 'fa fa-registered', ReferralNft::class),
        ];
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('CMS');
    }

    public function configureCrud(): Crud
    {
        return parent::configureCrud()
            ->showEntityActionsInlined();
    }

    public function configureActions(): Actions
    {
        return parent::configureActions()
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());
    }
}
