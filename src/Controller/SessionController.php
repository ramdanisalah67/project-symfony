<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SessionController extends AbstractController
{
    #[Route('/session', name: 'app_session')]
    public function index(Request $request): Response
    {
        //equivalent a session start()
            $mysession=$request->getSession();

            if($mysession->has('password')){
                $nbr_Visites=$mysession->get('password')+1 ;
            }
            else{
                $nbr_Visites=1 ;

            }
            $mysession->set('password',$nbr_Visites);
            return $this->render('session/index.html.twig', [
                'controller_name' => 'SessionController',
            ]);


    }
}
