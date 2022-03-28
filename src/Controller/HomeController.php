<?php

namespace App\Controller;

use App\Repository\EstablishmentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'Home', methods: ['GET'])]
    public function index(EstablishmentsRepository $establishmentsRepository): Response
    {
        return $this->render('Home.html.twig', [
            'establishments' => $establishmentsRepository->findAll(),
        ]);
    }
}