<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GProduitController extends AbstractController
{
    #[Route('/g/produit', name: 'app_g_produit')]
    public function index(): Response
    {
        //  die("hello my name is salah-eddie");
        return new Response(

            "<h1>welcome to Controller</h1>
                   <p>first coding controller</p>
            
            "

        );
    }
}