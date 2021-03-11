<?php

namespace App\Controller;

use App\Repository\CampusRepository;
use App\Repository\OutingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeConnectedController extends AbstractController
{
    /**
     * @Route("/accueilSession", name="home_connected")
     * @param CampusRepository $campusRepository
     * @param OutingRepository $outingRepository
     * @return Response
     */
    public function index(CampusRepository $campusRepository, OutingRepository $outingRepository): Response
    {

        return $this->render('pages/homeConnected.html.twig',[
            'campus' => $campusRepository->findAll(),
            'outing' => $outingRepository->findAll()
        ]);
    }
}
