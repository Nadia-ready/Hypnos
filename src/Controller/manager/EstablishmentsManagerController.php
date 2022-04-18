<?php

namespace App\Controller\manager;

use App\Entity\Establishments;
use App\Entity\User;
use App\Form\EstablishmentsType;
use App\Repository\EstablishmentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;


class EstablishmentsManagerController extends AbstractController
{

    protected User $user;
    public function __construct(Security $security) {
      $this->user = $security->getUser();
    }


    #[Route('/manager/establishments', name: 'manager_establishments_list', methods: ['GET'])]
    public function index(EstablishmentsRepository $establishmentsRepository): Response
    {

        return $this->render('manager/establishments.html.twig', [
            'establishments' => $this->user->getEstablishment(),

        ]);
    }

    #[Route('/manager/establishments/{id}', name: 'manager_establishments_list_show', methods: ['GET'])]
    public function show(Establishments $establishment): Response
    {
        return $this->render('manager/establishmentsShow.html.twig', [
            'establishment' => $establishment,
            'mainImage' => $establishment->getMainImage(),
            'images' => $establishment->getImages(),
        ]);

    }







}
