<?php

namespace App\Controller;

use App\Entity\Arrondissement;
use App\Entity\AttestationArretTravail;
use App\Entity\AttestationTravail;
use App\Entity\Banque;
use App\Entity\Charge;
use App\Entity\Delegation;
use App\Entity\Employe;
use App\Entity\PartResponsablePayement;
use App\Entity\Poste;
use App\Entity\PosteDeTravail;
use App\Entity\Rappel;
use App\Entity\Salaire;
use App\Repository\ArrondissementRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class FicheController extends AbstractController
{
    /**
     * @Route("/fiche", name="fiche")
     */
    public function index(ArrondissementRepository $repo)
    {
        $repo = $this->getDoctrine()->getRepository(Arrondissement::class);

        $arrondissements = $repo->findAll();

        return $this->render('fiche/index.html.twig', [
            'controller_name' => 'FicheController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */

    public function home (){

        return $this->render('fiche/home.html.twig');
    }

    /**
     * @Route("/fiche/nouveauarrondissement", name="arrondissement_create")
     */

    public function createArrondissement(Request $request, ObjectManager $manager )

    {

        $arrondissement = new Arrondissement();
        $form = $this->createFormBuilder($arrondissement)
            ->add('nom_arrondissement', TextType::class , [
                'attr' => [
                    'placeholder' => "nom de l'arrondissement"

                ]

            ])
            ->add('delegations', TextType::class , [
                'attr' => [
                    'placeholder' => "nom de la delegation"

                ]

            ])

            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($arrondissement);
            $manager->flush();


        }

        return $this->render('fiche/createArrondissement.html.twig', [
            'formArrondissement' => $form->createView()
        ]);
    }


    /**
     * @Route("/fiche/salaire", name="salaire_create")
     */

    public function createSalaire(Request $request, ObjectManager $manager )

    {
        $salaire = new Salaire();
        $form= $this->createFormBuilder($salaire)
            ->add('type_de_paiement', TextType::class , [
                'attr' => [
                    'placeholder' => "type de paiement"

                ]

            ])
            ->add('categorie_salaire', TextType::class , [
                'attr' => [
                    'placeholder' => "categorie du salaire"

                ]

            ])
            ->add('montant_salaire', TextType::class , [
                'attr' => [
                    'placeholder' => "le montant du salaire"

                ]

            ])
            ->add('date_attribution_salaire')
            ->add('nbre_heures_travail')
            ->getForm();








        return $this->render('fiche/createSalaire.html.twig', [
            'formSalaire' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/employe", name="employe_create")
     */

    public function createEmploye(Request $request, ObjectManager $manager )

    {
        $employe = new Employe();
        $form= $this->createFormBuilder($employe)
            ->add('cin', TextType::class , [
                'attr' => [
                    'placeholder' => "numero carte identite"

                ]

            ])
            ->add('cnss', TextType::class , [
                'attr' => [
                    'placeholder' => "numero cnss"

                ]

            ])
            ->add('nom', TextType::class , [
                'attr' => [
                    'placeholder' => "le nom"

                ]

            ])
            ->add('prenom')
            ->add('lieu_de_naissance')
            ->add('statut_familial')
            ->add('adresse')
            ->add('matricule')
            ->add('telephone')
            ->add('diplome')
            ->add('niveau_scolaire')
            ->add('age')
            ->add('date_de_naissance')
            ->add('date_debut_travail')


            ->getForm();








        return $this->render('fiche/createEmploye.html.twig', [
            'formEmploye' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/partiresponsablepayement", name="partiresponsablepayement_create")
     */

    public function createPartResponsablePayement(Request $request, ObjectManager $manager )

    {
        $partresponsablepayement = new PartResponsablePayement();
        $form= $this->createFormBuilder($partresponsablepayement)
            ->add('nom_employeur', TextType::class , [
                'attr' => [
                    'placeholder' => "nom employeur"

                ]

            ])
            ->add('adresse_employeur', TextType::class , [
                'attr' => [
                    'placeholder' => "adresse employeur"

                ]

            ])
            ->add('telephone_employeur', TextType::class , [
                'attr' => [
                    'placeholder' => "telephone employeur"

                ]

            ])
            ->add('email_employeur')



            ->getForm();








        return $this->render('fiche/createPartResponsablePaiement.html.twig', [
            'formPartResponsablePaiement' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/delegation", name="delegation_create")
     */

    public function createDelegation(Request $request, ObjectManager $manager )

    {
        $delegation = new Delegation();
        $form= $this->createFormBuilder($delegation)
            ->add('nom_delegation', TextType::class , [
                'attr' => [
                    'placeholder' => "nom de la delegation"

                ]

            ])




            ->getForm();








        return $this->render('fiche/createDelegation.html.twig', [
            'formDelegation' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/postetravail", name="postetravail_create")
     */

    public function createPosteDeTravail(Request $request, ObjectManager $manager )

    {
        $postedetravail = new PosteDeTravail();
        $form= $this->createFormBuilder($postedetravail)
            ->add('adresse', TextType::class , [
                'attr' => [
                    'placeholder' => "adresse du poste de travail"

                ]

            ])




            ->getForm();








        return $this->render('fiche/createPosteDeTravail.html.twig', [
            'formPosteDeTravail' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/banque", name="banque_create")
     */

    public function createBanque(Request $request, ObjectManager $manager )

    {
        $banque = new Banque();
        $form= $this->createFormBuilder($banque)
            ->add('nom_banque', TextType::class , [
                'attr' => [
                    'placeholder' => "nom de la banque"

                ]

            ])
            ->add('adresse_banque')
            ->add('telephone_banque')
            ->getForm();
        return $this->render('fiche/createBanque.html.twig', [
            'formBanque' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/poste", name="poste_create")
     */

    public function createPoste(Request $request, ObjectManager $manager )

    {
        $poste = new Poste();
        $form= $this->createFormBuilder($poste)
            ->add('nom_poste', TextType::class , [
                'attr' => [
                    'placeholder' => "nom de la poste"

                ]

            ])
            ->add('adresse_poste')
            ->add('telephone_poste')
            ->getForm();
        return $this->render('fiche/createPoste.html.twig', [
            'formPoste' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/charges", name="charges_create")
     */

    public function createCharge(Request $request, ObjectManager $manager )

    {
        $charge = new Charge();
        $form= $this->createFormBuilder($charge)
            ->add('date')
            ->add('charge_cnss_patron')
            ->add('charge_cnss_employe')
            ->add('taxe')
            ->getForm();
        return $this->render('fiche/createCharge.html.twig', [
            'formCharge' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/rappel", name="rappel_create")
     */

    public function createRappel(Request $request, ObjectManager $manager )

    {
        $rappel = new Rappel();
        $form= $this->createFormBuilder($rappel)
            ->add('date_saisie')
            ->add('espace_temps_requis')
            ->getForm();
        return $this->render('fiche/createRappel.html.twig', [
            'formRappel' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/attestationtravail", name="attestationtravail_create")
     */

    public function createAttestationTravail(Request $request, ObjectManager $manager )

    {
        $attestationtravail = new AttestationTravail();
        $form= $this->createFormBuilder($attestationtravail)
            ->add('date_impression')
            ->getForm();
        return $this->render('fiche/createAttestationTravail.html.twig', [
            'formAttestationTravail' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/attestationarrettravail", name="attestationarrettravail_create")
     */

    public function createAttestationArretTravail(Request $request, ObjectManager $manager )

    {
        $attestationarrettravail = new AttestationArretTravail();
        $form= $this->createFormBuilder($attestationarrettravail)
            ->add('date_saisie')
            ->add('date_arret')
            ->add('condition_arret')

            ->getForm();
        return $this->render('fiche/createAttestationArretTravail.html.twig', [
            'formAttestationArretTravail' => $form->createView()
        ]);
    }
}
