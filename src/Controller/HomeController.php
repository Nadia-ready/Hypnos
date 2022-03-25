<?php

namespace App\Controller;

use App\Repository\EstablishmentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/establishments', name: 'Home', methods: ['GET'])]
    public function index(EstablishmentsRepository $establishmentsRepository): Response
    {
        return $this->render('admin/establishments/index.html.twig', [
            'establishments' => $establishmentsRepository->findAll(),
        ]);
    }
}