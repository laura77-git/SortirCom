<?php

namespace App\Controller;

use App\Repository\CampusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeConnectedController extends AbstractController
{
    /**
     * @Route("/accueilSession", name="home_connected")
     * @param CampusRepository $campusRepositoryr
     * @return Response
     */
    public function index(CampusRepository $campusRepository): Response
    {

        return $this->render('pages/homeConnected.html.twig',[
            'campus' => $campusRepository->findAll()
        ]);
    }
}
