<?php

namespace App\Controller;

use App\Form\RegistrationType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityContollerController extends AbstractController
{


    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration (Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder)
    {

        $user = new User();


        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('security_login');
        }

            return $this->render('security_contoller/registration.html.twig', [
                'form' => $form->createView()
            ]);
        }

    /**
     * @Route("/connexion", name="security_login")
     */

        public function login(){

        return $this->render('security_contoller/login.html.twig');



        }

        /**
         * @Route("/deconnexion", name="security_logout")
         */

        public function logout(){}


}






