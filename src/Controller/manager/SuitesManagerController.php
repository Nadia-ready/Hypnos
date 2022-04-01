<?php

namespace App\Controller\manager;

use App\Entity\Suites;
use App\Form\SuitesType;
use App\Repository\SuitesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SuitesManagerController extends AbstractController
{

    #[Route('/manager/suites', name: 'manager_suites_list', methods: ['GET'])]
    public function index(SuitesRepository $suitesRepository): Response
    {

        return $this->render('manager/suites/index.html.twig', [
            'suites' => $suitesRepository->findAll(),
        ]);
    }

    #[Route('/manager/suites/new', name: 'manager_suites_list_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SuitesRepository $suitesRepository): Response
    {
        $suite = new Suites();
        $form = $this->createForm(SuitesType::class, $suite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $suitesRepository->add($suite);
            return $this->redirectToRoute('manager_establishments_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('manager/suites/new.html.twig', [
            'suite' => $suite,
            'form' => $form,
        ]);
    }

    #[Route('/manager/suites/{id}', name: 'suites_list_show', methods: ['GET'])]
    public function show(Suites $suite): Response
    {
        return $this->render('manager/suites/show.html.twig', [
            'suite' => $suite,
        ]);
    }

    #[Route('/manager/suites/{id}/edit', name: 'suites_list_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Suites $suite, SuitesRepository $suitesRepository): Response
    {
        $form = $this->createForm(SuitesType::class, $suite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $suitesRepository->add($suite);
            return $this->redirectToRoute('manager_establishments_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('manager/suites/edit.html.twig', [
            'suite' => $suite,
            'form' => $form,
        ]);
    }

    #[Route('/manager/suites/{id}', name: 'suites_list_delete', methods: ['POST'])]
    public function delete(Request $request, Suites $suite, SuitesRepository $suitesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$suite->getId(), $request->request->get('_token'))) {
            $suitesRepository->remove($suite);
        }

        return $this->redirectToRoute('manager_establishments_list', [], Response::HTTP_SEE_OTHER);
    }
}
