<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class AppController extends AbstractController
{
    #[Route('/{vueRouting}', name: 'app', requirements: ['vueRouting' => '.*'])]
    public function index(): Response
    {
        return $this->render('base.html.twig');
    }
}

/*
class AppController extends AbstractController
{
    #[Route('/app', name: 'app_app')]
    public function index(): Response
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }
}*/