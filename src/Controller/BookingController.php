<?php

namespace App\Controller;

use App\Entity\Reservations;
use App\Entity\Suites;
use App\Form\ReservationsType;
use App\Repository\EstablishmentsRepository;
use App\Repository\ReservationsRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{

    #[Route('/reservationsSuites', name: 'reservationsSuites', methods: ['GET', 'POST'])]
    public function reservationsSuites(ReservationsRepository $reservationsRepository, EstablishmentsRepository $establishmentsRepository): Response
    {
        return $this->render('reservations/bookingShow.html.twig', [
            'reservations' => $reservationsRepository->findAll(),
            'establishments' => $establishmentsRepository->findAll()
        ]);

    }
    #[Route('/suites/{id}/thumbnail', name: 'thumbnail', methods: ['GET'])]
    public function suiteThumbnail(Request $request, Suites $suite) {
        return $this->render('reservations/thumbnail.html.twig', [
            'suite' => $suite
        ]);
    }

    #[Route('/booking/{id}', name: 'booking', methods: ['GET', 'POST'])]
    public function booking(Request $request, Suites $suites, ReservationsRepository $reservationsRepository, EstablishmentsRepository $establishmentsRepository, UserRepository $userRepository): Response
    {
        $reservation = new Reservations();
        $form = $this->createForm(ReservationsType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservationsRepository->add($reservation);
            return $this->redirectToRoute('reservationsSuites', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservations/booking.html.twig', [
            'establishments' => $establishmentsRepository->findAll(),
            'reservation' => $reservation,
            'form' => $form,

            'user' => $userRepository->findAll(),
        ]);
    }
}