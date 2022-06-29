<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Entity\Series;
use App\Entity\Produit;
use App\Entity\Category;
use App\Entity\Polydart;
use App\Entity\CustomPage;
use App\Entity\Transaction;
use App\Entity\MessageContact;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/my-dashboard.html.twig');
    }

    
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Polydart Admin Panel');
    }

    // pour avatar 

    //  public function configureUserMenu(UserInterface $user): UserMenu
    //  {

    // //     if (!$user instanceof User) {
    // //         throw new \Exception('Mauvais user');
    // //     }

    //      return parent::configureUserMenu($user)
    //     // ->setAvatarUrl($user->getAvatarUri());

    //     //page de profile
    //     // ->setMenuItems( [
    //     //     MenuItem::linkToUrl('Mon Profile', 'fas fa-user', $this->generateUrl())
    //     // ])
    //  }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::section('menu'),
            MenuItem::linkToDashboard('Dashboard', 'fa fa-bars'),
            MenuItem::section(''), 
            MenuItem::section('Contenu'),
            MenuItem::linkToCrud('Polydart', 'fa fa-house-user', Polydart::class),
            MenuItem::linkToCrud('Users', 'fa fa-user', Users::class),
            MenuItem::linkToCrud('Produits', 'fa fa-box', Produit::class),
            MenuItem::linkToCrud('Category', 'fa fa-book-open', Category::class),
            MenuItem::linkToCrud('messageContact', 'fa fa-envelope', MessageContact::class),
            MenuItem::linkToCrud('Series', 'fa fa-user', Series::class),
            MenuItem::linkToCrud('Transaction', 'fa fa-dollar-sign', Transaction::class),
            MenuItem::linkToCrud('CustomPage', 'fa fa-dollar-sign', CustomPage::class),
            MenuItem::section(''),
            MenuItem::section('Accueil'),
            MenuItem::linkToUrl('Homepage', 'fas fa-home', $this->generateUrl('app_main')),
            MenuItem::section(''),    
        ];
        
    }

    public function configureActions(): Actions
    {
        return parent::configureActions()
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }


    // pour changer le css

    // public function configureAssets(): Assets
    // {
    //     return parent::configureAssets()
    //     ->addWebpackEncoreEntry('admin');
    // }
  
}
