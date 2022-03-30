<?php

namespace App\Controller\manager;

use App\Entity\Establishments;
use App\Form\EstablishmentsType;
use App\Repository\EstablishmentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EstablishmentsController extends AbstractController
{
    #[Route('/manager/establishments', name: 'manager_establishments_list', methods: ['GET'])]
    public function index(EstablishmentsRepository $establishmentsRepository): Response
    {


        return $this->render('manager/establishments.html.twig', [
            'establishments' => $establishmentsRepository->findAll(),
        ]);
    }

    #[Route('/admin/establishments/new', name: 'establishments_list_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EstablishmentsRepository $establishmentsRepository): Response
    {
        $establishment = new Establishments();
        $form = $this->createForm(EstablishmentsType::class, $establishment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $establishmentsRepository->add($establishment);
            return $this->redirectToRoute('establishments_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/establishments/new.html.twig', [
            'establishment' => $establishment,
            'form' => $form,
        ]);
    }

    #[Route('/admin/establishments/{id}', name: 'establishments_list_show', methods: ['GET'])]
    public function show(Establishments $establishment): Response
    {
        return $this->render('admin/establishments/show.html.twig', [
            'establishment' => $establishment,
        ]);
    }

    #[Route('/admin/establishments/{id}/edit', name: 'establishments_list_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Establishments $establishment, EstablishmentsRepository $establishmentsRepository): Response
    {
        $form = $this->createForm(EstablishmentsType::class, $establishment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $establishmentsRepository->add($establishment);
            return $this->redirectToRoute('establishments_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/establishments/edit.html.twig', [
            'establishment' => $establishment,
            'form' => $form,
        ]);
    }

    #[Route('/admin/establishments/{id}', name: 'establishments_list_delete', methods: ['POST'])]
    public function delete(Request $request, Establishments $establishment, EstablishmentsRepository $establishmentsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$establishment->getId(), $request->request->get('_token'))) {
            $establishmentsRepository->remove($establishment);
        }

        return $this->redirectToRoute('establishments_list', [], Response::HTTP_SEE_OTHER);
    }
}
