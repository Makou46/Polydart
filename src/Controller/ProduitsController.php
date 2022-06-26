<?php

namespace App\Controller;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitsController extends AbstractController
{
    /**
     * @Route("/produits", name="app_produits")
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        $produits = $produitRepository->findAll();

        return $this->render('produits/produits.html.twig', [
            'controller_name' => 'ProduitsController',
            'produits' => $produits,
        ]);
    }

    /**
     * @Route("/produits/{id}", name="app_produit")
     */
    public function singleProduit(): Response
    {
        return $this->render('produits/produits.html.twig', [
            'controller_name' => 'SingleProduitController',
        ]);
    }
}
