<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HeritageController extends AbstractController
{
    #[Route('/twig', name: 'app_heritage')]
    public function index(): Response
    {
        return $this->render('heritage/details.html.twig', [
            'controller_name' => 'HeritageController',
        ]);
    }


    #[Route('/twig/heritage', name: 'heritage')]
    public function heritage(): Response
    {
        return $this->render('heritage.html.twig');
    }
}
