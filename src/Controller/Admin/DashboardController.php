<?php

namespace App\Controller\Admin;

use App\Entity\Game\Game;
use App\Entity\Joystick\Brand;
use App\Entity\Joystick\Joystick;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig', [
        ]);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Joy Binding');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
         yield MenuItem::linkToCrud('Marque', 'fas fa-list', Brand::class);
         yield MenuItem::linkToCrud('Joystick', 'fas fa-list', Joystick::class);
         yield MenuItem::linkToCrud('Jeux', 'fas fa-list', Game::class);
    }
}
