<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use App\Repository\CampusRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController extends AbstractController
{
    /**
     * @Route ("/inscription", name="security_registration")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param UserPasswordEncoderInterface $encoder
     * @param CampusRepository $campusRepository
     * @return Response
     */
    public function registration(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder, CampusRepository $campusRepository): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Votre compte a bien été crée avec succès');
            return $this->redirectToRoute('security_registration');
        }

        return $this->render('admin/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("/", name="security_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */

    // fonction pour récuperer message d'erreur dans formulaire de login
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastusername = $authenticationUtils->getLastUsername();
        return$this->render('security/login.html.twig', [
            'last_username' => $lastusername,
            'error'         => $error,
        ]);
    }

    /**
     * @Route ("/deconnexion", name="security_logout")
     */
    public function logout()
    {

    }

}
