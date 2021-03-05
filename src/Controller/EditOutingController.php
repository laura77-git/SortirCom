<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditOutingController extends AbstractController
{
    /**
     * @Route("/modifierSortie", name="edit_outing")
     */
    public function index(): Response
    {
        return $this->render('pages/editOuting.html.twig');
    }
}
