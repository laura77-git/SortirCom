<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowOutingController extends AbstractController
{
    /**
     * @Route("/afficherSortie", name="show_outing")
     */
    public function index(): Response
    {
        return $this->render('pages/showOuting.html.twig');
    }
}
