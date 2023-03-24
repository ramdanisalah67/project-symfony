<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TabController extends AbstractController
{
    #[Route('/tab/{taille?5<\d+>}', name: 'app_tab')]
    public function index($taille): Response
    {
        $notes =[];
        for ($i=0;$i<$taille;$i++){
        $notes[]=rand(0,20);

        }
        return $this->render('tab/details.html.twig', [
            'notes' => $notes,'path'=>'   '
        ]);
    }

    #[Route('users', name: 'tab.users')]
    public function users(): Response
    {$users=[
        ['name'=>'salah-eddine','age'=>'25'],
        ['name'=>'mohammed','age'=>'28'],
        ['name'=>'omar','age'=>'37']



    ];

        return $this->render('tab/users.html.twig',['users'=>$users]) ;
    }
}
