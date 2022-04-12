<?php

namespace App\Controller;

use App\Entity\Suites;
use App\Form\SuitesType;
use App\Repository\SuitesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SuitesController extends AbstractController
{


    #[Route('/suites/{id}', name: 'suites_show', methods: ['GET'])]
    public function show(Suites $suite): Response
    {
        return $this->render('suitesShow.html.twig', [
            'suite' => $suite,
        ]);
    }
}

