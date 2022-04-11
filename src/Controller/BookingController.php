<?php

namespace App\Controller;

use App\Entity\Reservations;
use App\Entity\Suites;
use App\Repository\EstablishmentsRepository;
use App\Repository\ReservationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{

    #[Route('/reservationsSuites', name: 'reservationsSuites', methods: ['GET', 'POST'])]
    public function reservationsSuites(ReservationsRepository $reservationsRepository, EstablishmentsRepository $establishmentsRepository): Response
    {
        return $this->render('reservations/booking.html.twig', [
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
}