<?php

namespace App\Controller\admin;

use App\Entity\Manager;
use App\Form\ManagerType;
use App\Repository\ManagerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ManagerController extends AbstractController
{
    #[Route('/admin/manager', name: 'manager_list', methods: ['GET'])]
    public function index(ManagerRepository $managerRepository): Response
    {
        return $this->render('manager/index.html.twig', [
            'managers' => $managerRepository->findAll(),
        ]);
    }

    #[Route('/admin/manager/new', name: 'manager_list_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ManagerRepository $managerRepository): Response
    {
        $manager = new Manager();
        $form = $this->createForm(ManagerType::class, $manager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $managerRepository->add($manager);
            return $this->redirectToRoute('manager_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('manager/new.html.twig', [
            'manager' => $manager,
            'form' => $form,
        ]);
    }

    #[Route('/admin/manager/{id}', name: 'manager_list_show', methods: ['GET'])]
    public function show(Manager $manager): Response
    {
        return $this->render('manager/show.html.twig', [
            'manager' => $manager,
        ]);
    }

    #[Route('/admin/manager/{id}/edit', name: 'manager_list_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Manager $manager, ManagerRepository $managerRepository): Response
    {
        $form = $this->createForm(ManagerType::class, $manager);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $managerRepository->add($manager);
            return $this->redirectToRoute('manager_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('manager/edit.html.twig', [
            'manager' => $manager,
            'form' => $form,
        ]);
    }

    #[Route('/admin/manager/{id}', name: 'manager_list_delete', methods: ['POST'])]
    public function delete(Request $request, Manager $manager, ManagerRepository $managerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$manager->getId(), $request->request->get('_token'))) {
            $managerRepository->remove($manager);
        }

        return $this->redirectToRoute('manager_list', [], Response::HTTP_SEE_OTHER);
    }
}
