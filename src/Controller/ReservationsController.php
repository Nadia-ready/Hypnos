<?php

namespace App\Controller;

use App\Entity\Reservations;
use App\Form\ReservationsType;
use App\Repository\ReservationsRepository;
use App\Validator\ReservationDelete;
use App\Validator\ReservationDeleteValidator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionBagInterface;
use Symfony\Component\Routing\Annotation\Route;


class ReservationsController extends AbstractController
{
    #[Route('/reservations', name: 'reservations_list', methods: ['GET'])]
    public function index(ReservationsRepository $reservationsRepository, Session $session): Response
    {
        return $this->render('reservations/index.html.twig', [
            'reservations' => $reservationsRepository->findAll(),
        ]);
    }

    #[Route('/reservations/new', name: 'reservations_list_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ReservationsRepository $reservationsRepository): Response
    {
        $reservation = new Reservations();
        $form = $this->createForm(ReservationsType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservationsRepository->add($reservation);
            return $this->redirectToRoute('reservations_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservations/new.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/reservations/{id}', name: 'reservations_list_show', methods: ['GET'])]
    public function show(Reservations $reservation): Response
    {
        return $this->render('reservations/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }

    #[Route('/reservations/{id}/edit', name: 'reservations_list_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reservations $reservation, ReservationsRepository $reservationsRepository): Response
    {
        $form = $this->createForm(ReservationsType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservationsRepository->add($reservation);
            return $this->redirectToRoute('reservations_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservations/edit.html.twig', [
            'reservation' => $reservation,
            'form' => $form,
        ]);
    }

    #[Route('/reservations/{id}', name: 'reservations_list_delete', methods: ['POST'])]
    public function delete(Request $request, Reservations $reservation, ReservationsRepository $reservationsRepository, ReservationDeleteValidator $validator): Response
    {
        if ($this->isCsrfTokenValid('delete' . $reservation->getId(), $request->request->get('_token'))) {

            if (!$validator->validate($reservation, new ReservationDelete())) {
                $referer = $request->headers->get('referer');
                return $this->redirect($referer);
            }

            $reservationsRepository->remove($reservation);
        }

        return $this->redirectToRoute('reservations_list', [], Response::HTTP_SEE_OTHER);
    }


}
