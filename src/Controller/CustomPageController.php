<?php

namespace App\Controller;

use App\Entity\CustomPage;
use App\Form\CustomPageType;
use App\Repository\CustomPageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/custom/page")
 */
class CustomPageController extends AbstractController
{
    /**
     * @Route("/", name="app_custom_page_index", methods={"GET"})
     */
    public function index(CustomPageRepository $customPageRepository): Response
    {
        return $this->render('custom_page/index.html.twig', [
            'custom_pages' => $customPageRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_custom_page_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CustomPageRepository $customPageRepository): Response
    {
        $customPage = new CustomPage();
        $form = $this->createForm(CustomPageType::class, $customPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $customPageRepository->add($customPage, true);

            return $this->redirectToRoute('app_custom_page_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('custom_page/new.html.twig', [
            'custom_page' => $customPage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_custom_page_show", methods={"GET"})
     */
    public function show(CustomPage $customPage): Response
    {
        return $this->render('custom_page/show.html.twig', [
            'custom_page' => $customPage,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_custom_page_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, CustomPage $customPage, CustomPageRepository $customPageRepository): Response
    {
        $form = $this->createForm(CustomPageType::class, $customPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $customPageRepository->add($customPage, true);

            return $this->redirectToRoute('app_custom_page_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('custom_page/edit.html.twig', [
            'custom_page' => $customPage,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_custom_page_delete", methods={"POST"})
     */
    public function delete(Request $request, CustomPage $customPage, CustomPageRepository $customPageRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$customPage->getId(), $request->request->get('_token'))) {
            $customPageRepository->remove($customPage, true);
        }

        return $this->redirectToRoute('app_custom_page_index', [], Response::HTTP_SEE_OTHER);
    }
}
