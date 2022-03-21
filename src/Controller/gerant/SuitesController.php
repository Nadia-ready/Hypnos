<?php

namespace App\Controller;

use App\Entity\Suites;
use App\Form\SuitesType;
use App\Repository\SuitesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/suites')]
class SuitesController extends AbstractController
{
    #[Route('/', name: 'app_suites_index', methods: ['GET'])]
    public function index(SuitesRepository $suitesRepository): Response
    {
        return $this->render('suites/index.html.twig', [
            'suites' => $suitesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_suites_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SuitesRepository $suitesRepository): Response
    {
        $suite = new Suites();
        $form = $this->createForm(SuitesType::class, $suite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $suitesRepository->add($suite);
            return $this->redirectToRoute('app_suites_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('suites/new.html.twig', [
            'suite' => $suite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_suites_show', methods: ['GET'])]
    public function show(Suites $suite): Response
    {
        return $this->render('suites/show.html.twig', [
            'suite' => $suite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_suites_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Suites $suite, SuitesRepository $suitesRepository): Response
    {
        $form = $this->createForm(SuitesType::class, $suite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $suitesRepository->add($suite);
            return $this->redirectToRoute('app_suites_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('suites/edit.html.twig', [
            'suite' => $suite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_suites_delete', methods: ['POST'])]
    public function delete(Request $request, Suites $suite, SuitesRepository $suitesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$suite->getId(), $request->request->get('_token'))) {
            $suitesRepository->remove($suite);
        }

        return $this->redirectToRoute('app_suites_index', [], Response::HTTP_SEE_OTHER);
    }
}
