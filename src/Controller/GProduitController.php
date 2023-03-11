<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use function Symfony\Bundle\FrameworkBundle\Controller\redirectToRoute;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GProduitController extends AbstractController
{
    #[Route('/g/produit', name: 'app_g_produit')]
    public function index(): Response
    {
        return $this->render('g_produit/index.html.twig',['name'=>'salah-eddine','cote'=>'backend']);
    }
    #[Route('dis_Hello', name: 'Hello')]
    public function sayHello(): Response
    {
        $nombre_aleatoire =rand(0,10);

        if($nombre_aleatoire %2 ==0)
        {
            return $this->forward('App\Controller\GProduitController::index');
          //  return $this->redirectToRoute('app_g_produit');

        }





        return $this->render('g_produit/Hello.html.twig',['name'=>'salah-eddine','cote'=>'backend']);

    }
}
