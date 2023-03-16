<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use function Symfony\Bundle\FrameworkBundle\Controller\redirectToRoute;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\length;
#[Route("/todo")]
class TodoController extends AbstractController
{
    /**
     *
     * @Route("/todo",name="app_todo")
     */

    public function index(Request $request):Response
    {
        $session = $request->getSession();

        if (!$session->has('todos')) {
            $data = ['achat' => 'Achete cles usb', 'cours' => 'finalisez mon cours', 'correction' => 'corriger mes examens'];
            $session->set('todos', $data);
            $this->addFlash('info', "la liste des todos viens d'etre  initialise !!!");
        }


        return $this->render('todo/index.html.twig');
    }

 //   #[Route('/AjouterTodo/{name}/{content}',name:'add_todo',defaults:['content'=>'sf6'])]
    #[Route('/AjouterTodo/{name?test}/{content?test}',name:'add_todo')]
    public function AddTodo(Request $request, $name, $content):RedirectResponse
    {
        $session = $request->getSession();

        if ($session->has('todos')) {
            $todos = $session->get('todos');

            if (isset($todos[$name])) {
                $this->addFlash('warning', "le Todo existe deja");

            } else {
                $todos[$name] = $content;
                $session->set('todos', $todos);
                $this->addFlash('success', "le Todo a ete ajoutée !!!");

            }
        } else {
            $this->addFlash('error', "la liste des todos n'est pas encore initialise !!!");

        }
        return $this->redirectToRoute('app_todo');
    }

    #[Route('/UpdateTodo/{name}/{content}',name:'updt')]
    public function Update(Request $request, $name, $content):RedirectResponse
    {
        $session = $request->getSession();

        if ($session->has('todos')) {
            $todos = $session->get('todos');

            if (isset($todos[$name])) {
                $todos[$name] = $content;
                $session->set('todos', $todos);
                $this->addFlash('success', "le Todo id $name a ete modifiée !!!");


            } else {
                $this->addFlash('warning', "le Todo n'existe pas");


            }
        } else {
            $this->addFlash('error', "la liste des todos n'est pas encore initialise !!!");

        }
        return $this->redirectToRoute('app_todo');
    }

    #[Route('/DeleteTodo/{name}',name:'del')]
    public function Delete(Request $request, $name):RedirectResponse
    {

        $session = $request->getSession();

        if ($session->has('todos')) {
            $todos = $session->get('todos');

            if (isset($todos[$name])) {
                unset($todos[$name]);
                $session->set('todos', $todos);
                $this->addFlash('success', "le Todo id $name a ete supprime !!!");

            } else {
                $this->addFlash('success', 'le Todo nexiste pas');

            }
        } else {
            $this->addFlash('error', "la liste des todos n'est pas encore initialise !!!");

        }
        return $this->redirectToRoute('app_todo');

    }

    #[Route('/resetTodo/',name:'res')]
    public function resett(Request $request):RedirectResponse
    {
        $session = $request->getSession();
        $session->remove('todos');
        return $this->redirectToRoute('app_todo');

    }

    //Le routeur de Symfony requirements et ordre des routes
    #[Route('/multi/{entier1<\d+>}/{entier2<\d+>}')]
    public function multiplication($entier1,$entier2){
        $resultat = $entier1*$entier2 ;
        return new Response("<h3>resultat est $resultat</h3>");

    }

}