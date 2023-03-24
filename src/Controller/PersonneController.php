<?php

namespace App\Controller;

use App\Entity\Personne ;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    #[Route('/',name:'personne.list')]
    public function index(ManagerRegistry $doctrine):Response{
        $repository = $doctrine->getRepository(Personne::class);
        $personnes = $repository->findAll();

        return $this->render('personne/index.html.twig',['personnes'=>$personnes]);
    }

    #[Route('/{id<\d+>}',name:'personne.detail')]
    public function details(ManagerRegistry $doctrine,$id):Response{
        $repository = $doctrine->getRepository(Personne::class);
        $personnes = $repository->find($id);
        if(!$personnes) {
            $this->addFlash('error', "la personne qui a id = $id n'existe pas");
            return  $this->redirectToRoute('personne.list') ;
        }

        return $this->render('personne/details.html.twig',['personnes'=>$personnes]);

    }



/*

    #[Route('/add', name: 'app_personne')]
    public function addPersonne(ManagerRegistry$doctrine ): Response
    {
        //$this->getDoctrine():version Sf<=5

      $entityManager = $doctrine->getManager();

        //Ajouter operation d'insertion dans ma transaction
        $entityManager->persist($personne);
        //Execute la transaction
        $entityManager->flush();
        return $this->render('personne/details.html.twig', [
            'personne_Ajoute' => $personne,
        ]);
    } */
}
