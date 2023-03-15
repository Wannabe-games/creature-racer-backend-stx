<?php

namespace App\Controller\Admin;

use App\Entity\Creature\Creature;
use App\Entity\Creature\CreatureLevel;
use App\Entity\Game\Lobby;
use App\Entity\ReferralNft;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('CMS');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::section('Users'),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
            MenuItem::linkToCrud('Creatures', 'fa fa-paw', Creature::class),
            MenuItem::linkToCrud('Price list', 'fa fa-money-bill', CreatureLevel::class),
            MenuItem::linkToCrud('Lobbies', 'fa fa-scale-balanced', Lobby::class),
            MenuItem::linkToCrud('Referral NFT', 'fa fa-registered', ReferralNft::class),
        ];
    }
}
