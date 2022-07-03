<?php

namespace App\Controller;

use App\Repository\CustomPageRepository;
use App\Repository\PagesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_main")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/page/{slug}", name="show_custom_page")
     */
    public function showCustomPage($slug, PagesRepository $customPageRepository): Response{
        $page = $customPageRepository->findOneBy(['slug' => $slug]);

        return $this->render('main/page.html.twig', [
            'page' => $page
        ]);
    }

    
}
