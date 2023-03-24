<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplateController extends AbstractController
{
    #[Route('/template', name: 'app_template')]
    public function index(): Response
    {
        return $this->render('template/details.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

#[Route('/template/static', name: 'st')]
    public function static(): Response
    {
        return $this->render('hello.html.twig', [
            'controller_name' => 'TemplateController',
        ]);
    }

}
