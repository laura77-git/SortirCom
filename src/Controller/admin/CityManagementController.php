<?php

namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CityManagementController extends AbstractController
{
    /**
     * @Route("/admin/gestionVille", name="city_management")
     */
    public function index(): Response
    {
        return $this->render('admin/cityManagement.html.twig');
    }
}
