<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CancelOutingController extends AbstractController
{
    /**
     * @Route("/annulerSortie", name="cancel_outing")
     */
    public function index(): Response
    {
        return $this->render('pages/cancelOuting.html.twig');
    }
}
