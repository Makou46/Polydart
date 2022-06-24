<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitsController extends AbstractController
{
    /**
     * @Route("/produits", name="app_produits")
     */
    public function index(): Response
    {
        return $this->render('produits/produits.html.twig', [
            'controller_name' => 'ProduitsController',
        ]);
    }
}
