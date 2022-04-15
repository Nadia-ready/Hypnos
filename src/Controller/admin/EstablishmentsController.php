<?php

namespace App\Controller\admin;

use App\Entity\Establishments;
use App\Entity\ImagesEstablishments;
use App\Entity\ImagesSuites;
use App\Form\EstablishmentsType;
use App\Repository\EstablishmentsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class EstablishmentsController extends AbstractController
{
    #[Route('/admin/establishments', name: 'establishments_list', methods: ['GET'])]
    public function index(EstablishmentsRepository $establishmentsRepository): Response
    {
        return $this->render('admin/establishments/index.html.twig', [
            'establishments' => $establishmentsRepository->findAll(),
        ]);
    }

    #[Route('/admin/establishments/new', name: 'establishments_list_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EstablishmentsRepository $establishmentsRepository, ManagerRegistry $doctrine): Response
    {
        $establishment = new Establishments();
        $form = $this->createForm(EstablishmentsType::class, $establishment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $images = $form->get('image')->getData();


            // On boucle sur les images
            foreach($images as $image){
                // On génère un nouveau nom de fichier
                $fichier = md5(uniqid()).'.'.$image->guessExtension();

                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );

                // On crée l'image dans la base de données
                $img = new ImagesEstablishments();
                $img->setName($fichier);
                $establishment->addImage($img);
            }

            $entityManager = $doctrine->getManager();
            $entityManager->persist($establishment);
            $entityManager->flush();

            $establishmentsRepository->add($establishment);
            return $this->redirectToRoute('establishments_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/establishments/new.html.twig', [
            'establishment' => $establishment,
            'form' => $form,
        ]);
    }

    #[Route('/admin/establishments/{id}', name: 'establishments_list_show', methods: ['GET'])]
    public function show(Establishments $establishment): Response
    {


        return $this->render('admin/establishments/show.html.twig', [
            'establishment' => $establishment,
            'mainImage' => $establishment->getMainImage(),
            'images' => $establishment->getImages(),
        ]);
    }

    #[Route('/admin/establishments/{id}/edit', name: 'establishments_list_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Establishments $establishment, EstablishmentsRepository $establishmentsRepository, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(EstablishmentsType::class, $establishment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $images = $form->get('image')->getData();

            // On boucle sur les images
            foreach($images as $image){
                // On génère un nouveau nom de fichier
                $fichier = md5(uniqid()).'.'.$image->guessExtension();

                // On copie le fichier dans le dossier uploads
                $image->move(
                    $this->getParameter('images_directory'),
                    $fichier
                );

                // On crée l'image dans la base de données
                $img = new ImagesEstablishments();
                $img->setName($fichier);
                $establishment->addImage($img);
            }

            $entityManager = $doctrine->getManager();
            $entityManager->persist($establishment);
            $entityManager->flush();


            $establishmentsRepository->add($establishment);
            return $this->redirectToRoute('establishments_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/establishments/edit.html.twig', [
            'establishment' => $establishment,
            'mainImage' => $establishment->getMainImage(),
            'images' => $establishment->getImages(),
            'form' => $form,
        ]);
    }

    #[Route('/admin/establishments/{id}', name: 'establishments_list_delete', methods: ['POST'])]
    public function delete(Request $request, Establishments $establishment, EstablishmentsRepository $establishmentsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$establishment->getId(), $request->request->get('_token'))) {
            $establishmentsRepository->remove($establishment);
        }

        return $this->redirectToRoute('establishments_list', [], Response::HTTP_SEE_OTHER);
    }


    #[Route('/delete/image/{id}', name: 'establishments_delete_image', methods: ['DELETE'])]
    public function deleteImage(ImagesEstablishments $imagesEstablishments, Request $request)
    {
        $data = json_decode($request->getContent(), true);

        // On vérifie si le token est valide
        if ($this->isCsrfTokenValid('delete' . $imagesEstablishments->getId(), $data['_token'])) {
            // On récupère le nom de l'image
            $nom = $imagesEstablishments->getName();
            // On supprime le fichier
            unlink($this->getParameter('images_directory') . '/' . $nom);

            // On supprime l'entrée de la base
            $em = $this->getDoctrine()->getManager();
            $em->remove($imagesEstablishments);
            $em->flush();

            // On répond en json
            return new JsonResponse(['success' => 1]);
        } else {
            return new JsonResponse(['error' => 'Token Invalide'], 400);
        }
    }

}
