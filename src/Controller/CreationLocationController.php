<?php

namespace App\Controller;

use App\Entity\Location;
use App\Form\LocationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationLocationController extends AbstractController
{
    /**
     * @Route("/creationLieu", name="creation_location")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function outing(Request $request, EntityManagerInterface $em): Response
    {

        $location = new Location();
        $locationform = $this->createForm(LocationType::class, $location);

        $locationform->handleRequest($request); //injecte les données du formulaire
        if ($locationform->isSubmitted() && $locationform->isValid())  //isValid permet d'afficher les messages d'erreurs de validation
        {

            $em->persist($location);   // sauvegarde les infos
            $em->flush();           // les envoie à la BDD
            $this->addFlash('success', 'Lieu crée avec succès');
            return $this->redirectToRoute('creation_location');
        }

        return $this->render('pages/creationLocation.html.twig', [
            'locationform' => $locationform->createView(),

        ]);
    }

}
