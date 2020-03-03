<?php

namespace App\Controller;

use App\Entity\AttestationArretTravail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AttestationArretTravailController extends AbstractController
{
    /**
     * @Route("/attestation/arret/travail/{id}", name="attestation_arret_travail")
     */
    public function index($id)
    {
        $attestationArretTravail = $this->getDoctrine()
            ->getRepository(AttestationArretTravail::class )

            ->find($id);
        return $this->render('attestation_arret_travail/index.html.twig', [
            'attestationArretTravail' => $attestationArretTravail
        ]);
    }
}
