<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ToDoDouController extends AbstractController
{
    #[Route('/tododou', name: 'app.tododou')]
    public function index(): Response
    {
        return $this->render('to_do_dou/index.html.twig', [
            'controller_name' => 'ToDoDouController',
        ]);
    }
}
