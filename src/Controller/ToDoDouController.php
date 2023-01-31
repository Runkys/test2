<?php

namespace App\Controller;

use App\data\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/todo')]
// route par défaut /todo
class ToDoDouController extends AbstractController
{
    private array $todolist;
    #[Route('/', name: 'app.tododou', methods: "GET")]
    public function index(Request $request): Response
    {
        // on récupére la session en cours
        $session = $request->getSession();
        $todolist = $session->get('todolist');
        // si todolist n'existe pas je la crée
        if($todolist == null){
            $session->set('todolist', $this->init());
        }
        

       return $this->render('todo/index.html.twig', 
       [
            'controller_name' => 'ToDoDouController',
            'todolist' => $session->get('todolist'),
           
            
        ]);
    }
    #[Route('/detail/{id}', name: 'app.todo.detail' , methods : "GET")]
    public function detail(Request $request, int $id): Response
    {
        $session = $request->getSession();

        // on récupère todolist dans la session
        $todolist = $session->get('todolist');
        $result = null;
        foreach($todolist as $todo)
        {
            if($todo->id === $id)
            {
                $result = $todo;
            }
        }
       if($result == null)
       {
            $this->addFlash('warning', 'La todo que vous tentez d\'afficher n\'existe pas' );
            
       }
        return $this->render('todo/detail.html.twig', [
            'controller_name' =>'ToDoDouController',
            'todo' => $result,
    ]);
    }
    /*
    * définir une route qui permettra le suppresion d'une tache
    * définir un bouton réalisant cette suppression
    *envoyée l'id de la tache à supprimer dans la route crée précédemment
    * parcourir la todolist et de supprimer de cette liste la todo (en comparant les ids par exemple)
    * redirection, vers ma pase todo
    */

        private function init()
        {
            return [
                new Todo("Apprendre symfony", "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, obcaecati!"),
                new Todo("Créer un controller","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, obcaecati!"),
                new Todo("Manipuler les données","Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, obcaecati!"),
            ];

        }


}
