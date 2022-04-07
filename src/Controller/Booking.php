<?php

namespace App\Controller;

use App\Repository\ReservationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Booking extends AbstractController
{

    #[Route('/reservationsSuites', name: 'reservationsSuites', methods: ['GET'])]
    public function reservationsSuites(ReservationsRepository $reservationsRepository ): Response
    {
        return $this->render('reservations/booking.html.twig', [
            'reservations' => $reservationsRepository->findAll(),
        ]);
    }
}