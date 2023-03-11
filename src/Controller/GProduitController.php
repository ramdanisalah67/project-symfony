<?php

namespace App\Controller;

use http\Client\Request;
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
    #[Route('dis_Hello/{name}', name: 'Hello')]
    public function sayHello(\Symfony\Component\HttpFoundation\Request $request, $name): Response
    {

        dd($request);
        return $this->render('g_produit/Hello.html.twig',['name'=>$name]);

    }
}
