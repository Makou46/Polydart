<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\SearchProduitType;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduitsController extends AbstractController
{
    /**
     * @Route("/produits", name="app_produits")
     */
    public function index(ProduitRepository $produitRepository, Request $request): Response
    {
        $produits = $produitRepository->findAll();

        $form = $this->createForm(SearchProduitType::class);

        $search = $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            // On recherche les produits correspondant aux mots clé
            $produits = $produitRepository->search(
                $search->get('mots')->getData(),
                $search->get('category')->getData());
        }

        

        return $this->render('produits/produits.html.twig', [
            'controller_name' => 'ProduitsController',
            'produits' => $produits,
            'form' => $form->createView()
        ]);
        
    }

    /**
     * @Route("/produits/{id}", name="app_produit")
     */
    public function singleProduit(Produit $produit): Response
    {
        

        return $this->render('produits/singleProduit.html.twig', [
            'controller_name' => 'SingleProduitController',
            'produits' => $produit,
        ]);
    }
}
