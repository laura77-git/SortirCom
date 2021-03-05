<?php

namespace App\Controller;

use App\Entity\Outing;
use App\Form\OutingType;
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
     * @return Response
     */
    public function outing(Request $request, EntityManagerInterface $em): Response
    {
        $outing = new Outing();
        $form = $this->createForm(OutingType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {

            $em->persist($outing);
            $em->flush();
            $this->addFlash('success', 'Sortie créee avec succès');
            return $this->redirectToRoute('home_connected');
        }

        return $this->render('pages/creationOuting.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
