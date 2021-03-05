<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeConnectedController extends AbstractController
{
    /**
     * @Route("/accueilSession", name="home_connected")
     */
    public function index(): Response
    {
        return $this->render('pages/homeConnected.html.twig');
    }
}
