<?php

namespace App\Controller\manager;

use App\Entity\Images;
use App\Entity\ImagesSuites;
use App\Entity\Suites;
use App\Form\SuitesType;
use App\Repository\SuitesRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SuitesManagerController extends AbstractController
{

    #[Route('/manager/suites', name: 'manager_suites_list', methods: ['GET'])]
    public function index(SuitesRepository $suitesRepository): Response
    {

        return $this->render('manager/suites/index.html.twig', [
            'suites' => $suitesRepository->findAll(),
        ]);
    }

    #[Route('/manager/suites/new', name: 'manager_suites_list_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SuitesRepository $suitesRepository, ManagerRegistry $doctrine): Response
    {
        $suite = new Suites();
        $form = $this->createForm(SuitesType::class, $suite);
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
                $img = new ImagesSuites();
                $img->setName($fichier);
                $suite->addImage($img);
            }

            $entityManager = $doctrine->getManager();
            $entityManager->persist($suite);
            $entityManager->flush();

            $suitesRepository->add($suite);
            return $this->redirectToRoute('manager_establishments_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('manager/suites/new.html.twig', [
            'suite' => $suite,
            'form' => $form,
        ]);
    }

    #[Route('/manager/suites/{id}', name: 'suites_list_show', methods: ['GET'])]
    public function show(Suites $suite): Response
    {
        return $this->render('manager/suites/show.html.twig', [
            'suite' => $suite,
        ]);
    }

    #[Route('/manager/suites/{id}/edit', name: 'suites_list_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Suites $suite, SuitesRepository $suitesRepository, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(SuitesType::class, $suite);
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
                $img = new ImagesSuites();
                $img->setName($fichier);
                $suite->addImage($img);
            }

            $entityManager = $doctrine->getManager();
            $entityManager->persist($suite);
            $entityManager->flush();


            $suitesRepository->add($suite);
            return $this->redirectToRoute('manager_establishments_list', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('manager/suites/edit.html.twig', [
            'suite' => $suite,
            'form' => $form,
        ]);
    }

    #[Route('/manager/suites/{id}', name: 'suites_list_delete', methods: ['POST'])]
    public function delete(Request $request, Suites $suite, SuitesRepository $suitesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$suite->getId(), $request->request->get('_token'))) {
            $suitesRepository->remove($suite);
        }

        return $this->redirectToRoute('manager_establishments_list', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/delete/image/{id}', name: 'suites_delete_image', methods: ['DELETE'])]
    public function deleteImage(ImagesSuites $imagesSuites, Request $request){
        $data = json_decode($request->getContent(), true);

        // On vérifie si le token est valide
        if($this->isCsrfTokenValid('delete'.$imagesSuites->getId(), $data['_token'])){
            // On récupère le nom de l'image
            $nom = $imagesSuites->getName();
            // On supprime le fichier
            unlink($this->getParameter('images_directory').'/'.$nom);

            // On supprime l'entrée de la base
            $em = $this->getDoctrine()->getManager();
            $em->remove($images);
            $em->flush();

            // On répond en json
            return new JsonResponse(['success' => 1]);
        }else{
            return new JsonResponse(['error' => 'Token Invalide'], 400);
        }
    }

}
