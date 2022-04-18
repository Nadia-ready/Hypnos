<?php

namespace App\Controller;


use App\Entity\Establishments;
use App\Entity\Suites;
use App\Repository\EstablishmentsRepository;
use App\Repository\SuitesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EstablishmentsCustomerController extends AbstractController
{
    #[Route('/establishments', name: 'customer_establishments_list', methods: ['GET'])]
    public function establishmentList(EstablishmentsRepository $establishmentsRepository): Response
    {
        return $this->render('establishments.html.twig', [
            'establishments' => $establishmentsRepository->findAll(),

        ]);
    }

    #[Route('/establishments/{id}', name: 'customer_establishments_show', methods: ['GET'])]
    public function show(Establishments $establishment, Suites $suites): Response
    {
        return $this->render('establishmentsShow.html.twig', [
            'establishment' => $establishment,
            'mainImage' => $establishment->getMainImage(),
            'images' => $establishment->getImages(),
            'suite' => $suites,
        ]);
    }



}
