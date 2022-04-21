<?php

namespace App\Controller;

use App\Entity\Reservations;
use App\Entity\Suites;
use App\Entity\User;
use App\Form\ReservationsType;
use App\Repository\EstablishmentsRepository;
use App\Repository\ReservationsRepository;
use App\Repository\SuitesRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class BookingController extends AbstractController
{


    #[Route('/reservationsSuites', name: 'reservationsSuites', methods: ['GET', 'POST'])]
    public function reservationsSuites(ReservationsRepository $reservationsRepository, EstablishmentsRepository $establishmentsRepository): Response
    {
        return $this->render('reservations/bookingShowAjax.html.twig', [
            'reservations' => $reservationsRepository->findAll(),
            'establishments' => $establishmentsRepository->findAll()
        ]);

    }

    #[Route('/suites/{id}/thumbnail', name: 'thumbnail', methods: ['GET'])]
    public function suiteThumbnail(Request $request, Suites $suite)
    {
        $bookingUrl = $this->generateUrl('booking', [
            'id' => $suite->getId(),
            'arrival_date' => $request->get('arrival_date'),
            'departure_date' => $request->get('departure_date'),
        ]);

        return $this->render('reservations/thumbnail.html.twig', [
            'suite' => $suite,
            'bookingUrl' => $bookingUrl,
        ]);
    }



    #[Route('/booking/{id}', name: 'booking', methods: ['GET', 'POST'])]
    public function booking(Request $request,User $user, Suites $suite, ReservationsRepository $reservationsRepository, EstablishmentsRepository $establishmentsRepository, SuitesRepository $suitesRepository, UserRepository $userRepository): Response
    {

        $reservation = new Reservations();
        $reservation->setSuite($suite);
        $reservation->setEstablishment($suite->getEstablishment());


        if ($arrival_date = $request->get('arrival_date')) {
            $reservation->setArrivalDate(new \DateTime($arrival_date));
        }

        if ($departure = $request->get('departure_date')) {
            $reservation->setDepartureDate(new \DateTime($departure));
        }

        $form = $this->createForm(ReservationsType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservationsRepository->add($reservation);
            return $this->redirectToRoute('bookingShowCustomer', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('reservations/booking.html.twig', [
            'establishments' => $establishmentsRepository->findAll(),
            'reservation' => $reservation,
            'form' => $form,
            'user' => $user,

        ]);
    }

    #[Route('/bookingShowCustomer', name: 'bookingShowCustomer', methods: ['GET', 'POST'])]
    public function bookingShowCustomer(ReservationsRepository $reservationsRepository, UserRepository $userRepository, Security $security): Response
    {

        $authUser = $security->getUser();

        if(empty($authUser)) {
            return $this->redirectToRoute('Login');
        }

        return $this->render('reservations/bookingShowCustomer.html.twig', [
            'reservations' => $authUser->getReservations(),
        ]);

    }
}