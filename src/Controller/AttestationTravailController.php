<?php

namespace App\Controller;

use App\Entity\AttestationTravail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AttestationTravailController extends AbstractController
{
    /**
     * @Route("/attestation/travail/{id}", name="attestation_travail")
     */
    public function index($id)
    {

        $attestationTravail = $this->getDoctrine()
            ->getRepository(AttestationTravail::class )

            ->find($id);
        return $this->render('attestation_travail/index.html.twig', [
            'attestationTravail' => $attestationTravail
        ]);
    }
}
