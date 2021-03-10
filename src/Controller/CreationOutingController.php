<?php

namespace App\Controller;

use App\Entity\Outing;
use App\Form\OutingType;
use App\Repository\CampusRepository;
use App\Repository\StateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreationOutingController extends AbstractController
{
    /**
     * @Route("/creationSortie", name="creation_outing")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param CampusRepository $campusRepository
     * @param StateRepository $stateRepository
     * @return Response
     */
    public function outing(Request $request, EntityManagerInterface $em, CampusRepository $campusRepository, StateRepository $stateRepository): Response
    {

        $outing = new Outing();
        $outingform = $this->createForm(OutingType::class, $outing);

        $outingform->handleRequest($request); //injecte les données du formulaire
        if ($outingform->isSubmitted() && $outingform->isValid())  //isValid permet d'afficher les messages d'erreurs de validation
        {

            $em->persist($outing);   // sauvegarde les infos
            $em->flush();           // les envoie à la BDD
            $this->addFlash('success', 'Sortie crée avec succès');
            return $this->redirectToRoute('creation_outing');
        }

        return $this->render('pages/creationOuting.html.twig', [
            'outingform' => $outingform->createView(),
            'campus' => $campusRepository->findAll(),
            'state' => $stateRepository->findAll()
        ]);
    }

}
