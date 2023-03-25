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
    public function details(Personne $personnes=null):Response{

        if(!$personnes) {
            $this->addFlash('error', "la personne qui a id = $id n'existe pas");
            return  $this->redirectToRoute('personne.list') ;
        }

        return $this->render('personne/details.html.twig',['personnes'=>$personnes]);

    }

    #[Route('/personne/All',name:'personne.All')]
    public function findAll(ManagerRegistry $doctrine):Response{
        $repository = $doctrine->getRepository(Personne::class);
        $personnes = $repository->findBy(['firstName'=>'y%'],['firstName'=>'ASC'],2,1);
        if(!$personnes) {
            $this->addFlash('error', "la personne qui vous êtes chercher n'existe pas");
            return  $this->redirectToRoute('personne.list') ;
        }

        return $this->render('personne/index.html.twig',['personnes'=>$personnes]);

    }
    #[Route('/personne/All2/{page?1}/{nbr?12}',name:'personne.All2')]
    public function findAll2(ManagerRegistry $doctrine,$nbr,$page):Response{
        $repository = $doctrine->getRepository(Personne::class);
        $personnes = $repository->findBy([],['firstName'=>'DESC'],$nbr,($page-1)*$nbr);


        return $this->render('personne/index.html.twig',['personnes'=>$personnes]);

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
