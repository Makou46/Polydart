<?php

namespace App\Controller;

use App\Repository\CustomPageRepository;
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
     * @Route("/page/{url}", name="show_custom_page")
     */
    public function showCustomPage($url, CustomPageRepository $customPageRepository): Response{
        $page = $customPageRepository->findOneBy(['url' => $url]);
        

        return $this->render('main/page.html.twig', [
            'page' => $page
        ]);
    }

    
}
