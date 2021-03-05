<?php

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CampusManagementController extends AbstractController
{
    /**
     * @Route("/admin/gestionCampus", name="campus_management")
     */
    public function index(): Response
    {
        return $this->render('admin/campusManagement.html.twig');
    }
}
