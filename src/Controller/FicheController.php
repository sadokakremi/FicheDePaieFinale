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
use App\Entity\User;
use App\Repository\ArrondissementRepository;
use App\Repository\AttestationArretTravailRepository;
use App\Repository\AttestationTravailRepository;
use App\Repository\BanqueRepository;
use App\Repository\ChargeRepository;
use App\Repository\DelegationRepository;
use App\Repository\PartResponsablePayementRepository;
use App\Repository\PosteRepository;
use App\Repository\PosteDeTravailRepository;
use App\Repository\RappelRepository;
use App\Repository\SalaireRepository;
use App\Service\UserLog;
use Psr\Log\LoggerInterface;



use App\Repository\EmployeRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Doctrine\DBAL\Query\QueryBuilder;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\Validator\Tests\Constraints\choice_callback;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\ArrondissementType;
use App\Form\AttestationArretTravailType;
use App\Form\AttestationTravailType;
use App\Form\BanqueType;
use App\Form\ChargeType;
use App\Form\DelegationType;
use App\Form\EmployeType;
use App\Form\PartResponsablePayementType;
use App\Form\PosteType;
use App\Form\PosteDeTravailType;
use App\Form\RappelType;
use App\Form\SalaireType;
use Dompdf\Dompdf;
use Dompdf\Options;











class FicheController extends AbstractController
{
    /**
     * @Route("/fiche/indexArrondissement", name="arrondissement_index", methods={"GET"})
     */
    public function indexArrondissement(ArrondissementRepository $arrondissementRepository): Response
    {
        return $this->render('fiche/indexArrondissement.html.twig', [
            'arrondissements' => $arrondissementRepository->findAll(),
        ]);
    }
    /**
     * @Route("/fiche/listearrondissement", name="arrondissement_liste", methods={"GET"})
     */
    public function listearrondissement(ArrondissementRepository $arrondissementRepository): Response
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('fiche/listearrondissement.html.twig', [
            'arrondissements' => $arrondissementRepository->findAll(),
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("Arrondissement.pdf", [
            "Attachment" => true
        ]);
    }

    /**
     * @Route("/fiche/listedelegation", name="delegation_liste", methods={"GET"})
     */
    public function listedelegation(DelegationRepository $delegationRepository): Response
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('fiche/listedelegation.html.twig', [
            'delegations' => $delegationRepository->findAll(),
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("Delegation.pdf", [
            "Attachment" => true
        ]);
    }

    /**
     * @Route("/fiche/listepostetravail", name="postetravail_liste", methods={"GET"})
     */
    public function listePosteDeTravail(PosteDeTravailRepository $posteDeTravailRepository): Response
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('fiche/listePosteDeTravail.html.twig', [
            'poste_de_travails' => $posteDeTravailRepository->findAll(),
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("PosteDeTravail.pdf", [
            "Attachment" => true
        ]);
    }

    /**
     * @Route("/fiche/listebanque", name="banque_liste", methods={"GET"})
     */
    public function listebanque(BanqueRepository $banqueRepository): Response
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('fiche/listebanque.html.twig', [
            'banques' => $banqueRepository->findAll(),
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("Banque.pdf", [
            "Attachment" => true
        ]);
    }

    /**
     * @Route("/fiche/listeposte", name="poste_liste", methods={"GET"})
     */
    public function listeposte(PosteRepository $posteRepository): Response
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('fiche/listeposte.html.twig', [
            'postes' => $posteRepository->findAll(),
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("Poste.pdf", [
            "Attachment" => true
        ]);
    }
    /**
     * @Route("/fiche/listePartResponsablePaiement", name="PartResponsablePaiement_liste", methods={"GET"})
     */
    public function listePartResponsablePaiement(PartResponsablePayementRepository $partResponsablePayementRepository): Response
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('fiche/listePartResponsablePaiement.html.twig', [
            'part_responsable_payements' => $partResponsablePayementRepository->findAll(),
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("PartResponsablePaiement.pdf", [
            "Attachment" => true
        ]);
    }

    /**
     * @Route("/fiche/listeEmploye", name="employe_liste", methods={"GET"})
     */
    public function listeEmploye(EmployeRepository $employeRepository): Response
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);


        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('fiche/listeEmploye.html.twig', [
            'employes' => $employeRepository->findAll(),
        ]);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
        $dompdf->stream("Employe.pdf", [
            "Attachment" => true
        ]);
    }







    /**
     * @Route("/fiche/indexAttestationArretTravail", name="attestationArretTravail_index", methods={"GET"})
     */
    public function indexAttestationArretTravail(AttestationArretTravailRepository $attestationArretTravailRepository): Response
    {
        return $this->render('fiche/indexAttestationArretTravail.html.twig', [
            'attestation_arret_travails' => $attestationArretTravailRepository->findAll(),
        ]);
    }
    /**
     * @Route("/fiche/indexAttestationTravail", name="attestationTravail_index", methods={"GET"})
     */
    public function indexAttestationTravail(AttestationTravailRepository $attestationTravailRepository): Response
    {
        return $this->render('fiche/indexAttestationTravail.html.twig', [
            'attestation_travails' => $attestationTravailRepository->findAll(),
        ]);
    }
    /**
     * @Route("/fiche/indexBanque", name="banque_index", methods={"GET"})
     */
    public function indexBanque(BanqueRepository $banqueRepository): Response
    {
        return $this->render('fiche/indexBanque.html.twig', [
            'banques' => $banqueRepository->findAll(),
        ]);
    }
    /**
     * @Route("/fiche/indexCharge", name="charge_index", methods={"GET"})
     */
    public function indexCharge(ChargeRepository $chargeRepository): Response
    {
        return $this->render('fiche/indexCharge.html.twig', [
            'charges' => $chargeRepository->findAll(),
        ]);
    }
    /**
     * @Route("/fiche/indexDelegation", name="delegation_index", methods={"GET"})
     */
    public function indexDelegation(DelegationRepository $delegationRepository): Response
    {
        return $this->render('fiche/indexDelegation.html.twig', [
            'delegations' => $delegationRepository->findAll(),
        ]);
    }
    /**
     * @Route("/fiche/indexEmploye", name="employe_index", methods={"GET"})
     */
    public function indexEmploye(EmployeRepository $employeRepository): Response
    {
        return $this->render('fiche/indexEmploye.html.twig', [
            'employes' => $employeRepository->findAll(),
        ]);
    }
    /**
     * @Route("/fiche/indexPartResponsablePaiement", name="PartResponsablePaiement_index", methods={"GET"})
     */
    public function indexPartResponsablePaiement(PartResponsablePayementRepository $partResponsablePayementRepository): Response
    {
        return $this->render('fiche/indexPartResponsablePaiement.html.twig', [
            'part_responsable_payements' => $partResponsablePayementRepository->findAll(),
        ]);
    }
    /**
     * @Route("/fiche/indexPoste", name="poste_index", methods={"GET"})
     */
    public function indexPoste(PosteRepository $posteRepository): Response
    {
        return $this->render('fiche/indexPoste.html.twig', [
            'postes' => $posteRepository->findAll(),
        ]);
    }
    /**
     * @Route("/fiche/indexPosteDeTravail", name="posteDeTravail_index", methods={"GET"})
     */
    public function indexPosteDeTravail(PosteDeTravailRepository $posteDeTravailRepository): Response
    {
        return $this->render('fiche/indexPosteDeTravail.html.twig', [
            'poste_de_travails' => $posteDeTravailRepository->findAll(),
        ]);
    }
    /**
     * @Route("/fiche/indexRappel", name="rappel_index", methods={"GET"})
     */
    public function indexRappel(RappelRepository $rappelRepository): Response
    {
        return $this->render('fiche/indexRappel.html.twig', [
            'rappels' => $rappelRepository->findAll(),
        ]);
    }
    /**
     * @Route("/fiche/indexSalaire", name="salaire_index", methods={"GET"})
     */
    public function indexSalaire(SalaireRepository $salaireRepository): Response
    {
        return $this->render('fiche/indexSalaire.html.twig', [
            'salaires' => $salaireRepository->findAll(),
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





            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($arrondissement);
            $manager->flush();

            return $this->redirectToRoute('fiche_showArrondissement', ['id' => $arrondissement->getId()]);



        }

        return $this->render('fiche/createArrondissement.html.twig', [
            'formArrondissement' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/editArrondissement/{id}", name="arrondissement_edit")
     * @Method({"GET", "POST"})
     */
    public function editArrondissement(Request $request, Arrondissement $arrondissement): Response
    {
        $form = $this->createForm(ArrondissementType::class, $arrondissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fiche_showArrondissement', [
                'id' => $arrondissement->getId(),
            ]);
        }

        return $this->render('fiche/editArrondissement.html.twig', [
            'arrondissement' => $arrondissement,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/fiche/salaire", name="salaire_create")
     */

    public function createSalaire(Request $request, ObjectManager $manager )

    {
        $salaire = new Salaire();
        $form= $this->createFormBuilder($salaire)
            ->add('type_de_paiement',  ChoiceType::class,  [

                'choices' => [
                    'cheque' => 'cheque' , 'espece'=> 'espece' , 'virement'=> 'virement'
                ]


            ])
            ->add('categorie_salaire', ChoiceType::class , [
                'choices'=> [
                    '1'=> '1' , '2'=>'2', '3'=> '3'
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
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager->persist($salaire);
            $manager->flush();
            return $this->redirectToRoute('fiche_showSalaire', ['id' => $salaire->getId()]);
        }








        return $this->render('fiche/createSalaire.html.twig', [
            'formSalaire' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/editSalaire/{id}", name="salaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editSalaire(Request $request, $id)
    {
        $salaire = new Salaire();
        $salaire=$this->getDoctrine()->getRepository(Salaire::class)->find($id);

        $form= $this->createFormBuilder($salaire)
            ->add('type_de_paiement',  ChoiceType::class,  [

                'choices' => [
                    'cheque' => 'cheque' , 'espece'=> 'espece' , 'virement'=> 'virement'
                ]


            ])
            ->add('categorie_salaire', ChoiceType::class , [
                'choices'=> [
                    '1'=> '1' , '2'=>'2', '3'=> '3'
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
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager=$this->getDoctrine()->getManager();
            $manager->flush();
            return $this->redirectToRoute('fiche_showSalaire', ['id' => $salaire->getId()]);
        }








        return $this->render('fiche/editSalaire.html.twig', [
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
            ->add('statut_familial', ChoiceType::class, [
                'choices'=> [
                    'celibataire' => 'celibataire' , 'en couple' => 'en couple'
                ]
            ])
            ->add('adresse')
            ->add('matricule')
            ->add('telephone')
            ->add('diplome')
            ->add('niveau_scolaire')
            ->add('age')
            ->add('date_de_naissance')
            ->add('date_debut_travail')
            ->add('createdAt')



            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager->persist($employe);
            $manager->flush();

            return $this->redirectToRoute('fiche_showEmploye', ['id' => $employe->getId()]);

        }







        return $this->render('fiche/createEmploye.html.twig', [
            'formEmploye' => $form->createView(),
        ]);
    }

    /**
     * @Route("/fiche/editEmploye/{id}", name="employe_edit")
     * @Method({"GET", "POST"})
     */
    public function editEmploye(Request $request, Employe $employe): Response
    {
        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fiche_showEmploye', [
                'id' => $employe->getId(),
            ]);
        }

        return $this->render('fiche/editEmploye.html.twig', [
            'employe' => $employe,
            'form' => $form->createView(),
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
            ->add('banque', EntityType::class, [
                'class' => Banque::class,
                'choice_label' => function ($banque) {
                    return $banque->getNomBanque();
                }
            ])
            ->add('poste', EntityType::class,
                [
                'class'=> Poste::class,
                    'choice_label' => function ($poste) {
                        return $poste->getNomPoste();
                    }
            ])



            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager->persist($partresponsablepayement);
            $manager->flush();

            return $this->redirectToRoute('fiche_showPartResponsablePaiement', ['id' => $partresponsablepayement->getId()]);

        }








        return $this->render('fiche/createPartResponsablePaiement.html.twig', [
            'formPartResponsablePaiement' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/editPartResponsablePayement/{id}", name="partResponsablePayement_edit")
     * @Method({"GET", "POST"})
     */
    public function editPartResponsablePaiement(Request $request, $id)
    {
        $partresponsablepayement = new PartResponsablePayement();

        $partresponsablepayement=$this->getDoctrine()->getRepository(PartResponsablePayement::class)->find($id);
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
            ->add('banque', EntityType::class, [
                'class' => Banque::class,
                'choice_label' => function ($banque) {
                    return $banque->getNomBanque();
                }
            ])
            ->add('poste', EntityType::class,
                [
                    'class'=> Poste::class,
                    'choice_label' => function ($poste) {
                        return $poste->getNomPoste();
                    }
                ])



            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager=$this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('fiche_showPartResponsablePaiement', ['id' => $partresponsablepayement->getId()]);

        }








        return $this->render('fiche/editPartResponsablePaiement.html.twig', [
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
            ->add('arrondissement', EntityType::class,
                [
                    'class'=> Arrondissement::class,
                    'choice_label' => function ($arrondissement) {
                        return $arrondissement->getNomArrondissement();
                    }
                ])




            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager->persist($delegation);
            $manager->flush();

            return $this->redirectToRoute('fiche_showDelegation', ['id' => $delegation->getId()]);

        }








        return $this->render('fiche/createDelegation.html.twig', [
            'formDelegation' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/editDelegation/{id}", name="delegation_edit")
     * @Method({"GET", "POST"})
     */
    public function editDelegation(Request $request, $id)
    {
        $delegation = new Delegation();
        $delegation=$this->getDoctrine()->getRepository(Delegation::class)->find($id);
        $form= $this->createFormBuilder($delegation)
            ->add('nom_delegation', TextType::class , [
                'attr' => [
                    'placeholder' => "nom de la delegation"

                ]

            ])
            ->add('arrondissement', EntityType::class,
                [
                    'class'=> Arrondissement::class,
                    'choice_label' => function ($arrondissement) {
                        return $arrondissement->getNomArrondissement();
                    }
                ])




            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager=$this->getDoctrine()->getManager();


            $manager->flush();

            return $this->redirectToRoute('fiche_showDelegation', ['id' => $delegation->getId()]);

        }








        return $this->render('fiche/editDelegation.html.twig', [
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
            ->add('arrondissement', EntityType::class,
                [
                    'class'=> Arrondissement::class,
                    'choice_label' => function ($arrondissement) {
                        return $arrondissement->getNomArrondissement();
                    }
                ])

            ->add('delegation', EntityType::class,
                [
                    'class'=> Delegation::class,
                    'choice_label' => function ($delegation) {
                        return $delegation->getNomDelegation();
                    }
                ])




            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager->persist($postedetravail);
            $manager->flush();

            return $this->redirectToRoute('fiche_showPosteDeTravail', ['id' => $postedetravail->getId()]);

        }








        return $this->render('fiche/createPosteDeTravail.html.twig', [
            'formPosteDeTravail' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/editPosteDeTravail/{id}", name="posteDeTravail_edit")
     * @Method({"GET", "POST"})
     */
    public function editPosteDeTravail(Request $request, $id)
    {
        $postedetravail = new PosteDeTravail();

        $postedetravail=$this->getDoctrine()->getRepository(PosteDeTravail::class)->find($id);
        $form= $this->createFormBuilder($postedetravail)
            ->add('adresse', TextType::class , [
                'attr' => [
                    'placeholder' => "adresse du poste de travail"

                ]

            ])
            ->add('arrondissement', EntityType::class,
                [
                    'class'=> Arrondissement::class,
                    'choice_label' => function ($arrondissement) {
                        return $arrondissement->getNomArrondissement();
                    }
                ])

            ->add('delegation', EntityType::class,
                [
                    'class'=> Delegation::class,
                    'choice_label' => function ($delegation) {
                        return $delegation->getNomDelegation();
                    }
                ])




            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager=$this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('fiche_showPosteDeTravail', ['id' => $postedetravail->getId()]);

        }








        return $this->render('fiche/editPosteDeTravail.html.twig', [
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

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager->persist($banque);
            $manager->flush();

            return $this->redirectToRoute('fiche_showBanque', ['id' => $banque->getId()]);

        }
        return $this->render('fiche/createBanque.html.twig', [
            'formBanque' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/editBanque/{id}", name="banque_edit")
     * @Method({"GET", "POST"})
     */
    public function editBanque(Request $request, Banque $banque): Response
    {
        $form = $this->createForm(BanqueType::class, $banque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fiche_showBanque', [
                'id' => $banque->getId(),
            ]);
        }

        return $this->render('fiche/editBanque.html.twig', [
            'banque' => $banque,
            'form' => $form->createView(),
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
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager->persist($poste);
            $manager->flush();

            return $this->redirectToRoute('fiche_showPoste', ['id' => $poste->getId()]);

        }
        return $this->render('fiche/createPoste.html.twig', [
            'formPoste' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/editPoste/{id}", name="poste_edit")
     * @Method({"GET", "POST"})
     */
    public function editPoste(Request $request, $id)
    {
        $poste = new Poste();
        $poste=$this->getDoctrine()->getRepository(Poste::class)->find($id);
        $form= $this->createFormBuilder($poste)
            ->add('nom_poste', TextType::class , [
                'attr' => [
                    'placeholder' => "nom de la poste"

                ]

            ])
            ->add('adresse_poste')
            ->add('telephone_poste')
            ->getForm();
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager=$this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('fiche_showPoste', ['id' => $poste->getId()]);

        }
        return $this->render('fiche/editPoste.html.twig', [
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

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager->persist($charge);
            $manager->flush();

            return $this->redirectToRoute('fiche_showCharge', ['id' => $charge->getId()]);

        }
        return $this->render('fiche/createCharge.html.twig', [
            'formCharge' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/editCharge/{id}", name="charge_edit")
     * @Method({"GET", "POST"})
     */
    public function editCharge(Request $request, Charge $charge): Response
    {
        $form = $this->createForm(ChargeType::class, $charge);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fiche_showCharge', [
                'id' => $charge->getId(),
            ]);
        }

        return $this->render('fiche/editCharge.html.twig', [
            'charge' => $charge,
            'form' => $form->createView(),
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
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager->persist($rappel);
            $manager->flush();

            return $this->redirectToRoute('fiche_showRappel', ['id' => $rappel->getId()]);
        }
        return $this->render('fiche/createRappel.html.twig', [
            'formRappel' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/editRappel/{id}", name="rappel_edit")
     * @Method({"GET", "POST"})
     */
    public function editRappel(Request $request, Rappel $rappel): Response
    {
        $form = $this->createForm(RappelType::class, $rappel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fiche_showRappel', [
                'id' => $rappel->getId(),
            ]);
        }

        return $this->render('fiche/editRappel.html.twig', [
            'rappel' => $rappel,
            'form' => $form->createView(),
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
            ->add('employe', EntityType::class,
                [
                    'class'=> Employe::class,
                    'choice_label' => function ($employe) {



                        return $employe->getMatricule();



                     }
                ])
            ->add('partresponsablepayement', EntityType::class,
                [
                    'class'=> PartResponsablePayement::class,
                    'choice_label' => function ($partresponsablepayement) {



                        return $partresponsablepayement->getNomEmployeur();



                    }
                ])


            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager->persist($attestationtravail);
            $manager->flush();

            return $this->redirectToRoute('fiche_showAttestationTravail', ['id' => $attestationtravail->getId()]);

        }
        return $this->render('fiche/createAttestationTravail.html.twig', [
            'formAttestationTravail' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/editAttestationTravail/{id}", name="attestationTravail_edit")
     * @Method({"GET", "POST"})
     */
    public function editAttestationTravail(Request $request, $id)
    {
        $attestationtravail = new AttestationTravail();
        $attestationtravail=$this->getDoctrine()->getRepository(AttestationTravail::class)->find($id);

        $form= $this->createFormBuilder($attestationtravail)
            ->add('date_impression')
            ->add('employe', EntityType::class,
                [
                    'class'=> Employe::class,
                    'choice_label' => function ($employe) {



                        return $employe->getMatricule();



                    }
                ])
            ->add('partresponsablepayement', EntityType::class,
                [
                    'class'=> PartResponsablePayement::class,
                    'choice_label' => function ($partresponsablepayement) {



                        return $partresponsablepayement->getNomEmployeur();



                    }
                ])


            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager=$this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('fiche_showAttestationTravail', ['id' => $attestationtravail->getId()]);

        }
        return $this->render('fiche/editAttestationTravail.html.twig', [
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
            ->add('employe', EntityType::class,
                [
                    'class'=> Employe::class,
                    'choice_label' => function ($employe) {



                        return $employe->getMatricule();



                    }
                ])
            ->add('partresponsablepayement', EntityType::class,
                [
                    'class'=> PartResponsablePayement::class,
                    'choice_label' => function ($partresponsablepayement) {



                        return $partresponsablepayement->getNomEmployeur();



                    }
                ])


            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager->persist($attestationarrettravail);
            $manager->flush();

            return $this->redirectToRoute('fiche_showAttestationArretTravail', ['id' => $attestationarrettravail->getId()]);

        }
        return $this->render('fiche/createAttestationArretTravail.html.twig', [
            'formAttestationArretTravail' => $form->createView()
        ]);
    }

    /**
     * @Route("/fiche/editAttestationArretTravail/{id}", name="attestationarrettravail_edit")
     * @Method({"GET", "POST"})
     */
    public function editAttestationArretTravail(Request $request,$id)
    {
        $attestationarrettravail = new AttestationArretTravail();
        $attestationarrettravail=$this->getDoctrine()->getRepository(AttestationArretTravail::class)->find($id);

        $form= $this->createFormBuilder($attestationarrettravail)
            ->add('date_saisie')
            ->add('date_arret')
            ->add('condition_arret')
            ->add('employe', EntityType::class,
                [
                    'class'=> Employe::class,
                    'choice_label' => function ($employe) {



                        return $employe->getMatricule();



                    }
                ])
            ->add('partresponsablepayement', EntityType::class,
                [
                    'class'=> PartResponsablePayement::class,
                    'choice_label' => function ($partresponsablepayement) {



                        return $partresponsablepayement->getNomEmployeur();



                    }
                ])


            ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $manager=$this->getDoctrine()->getManager();
            $manager->flush();

            return $this->redirectToRoute('fiche_showAttestationArretTravail', ['id' => $attestationarrettravail->getId()]);

        }
        return $this->render('fiche/editAttestationArretTravail.html.twig', [
            'formAttestationArretTravail' => $form->createView()
        ]);

    }

    /**
     * @Route("/fiche/showEmploye{id}", name="fiche_showEmploye" )
     */

    public function showEmploye(Employe $employe){


        return $this->render('fiche/showEmploye.html.twig', array('employe'=>$employe)

        );
    }

    /**
     * @Route("/fiche/showSalaire{id}", name="fiche_showSalaire" )
     */

    public function showSalaire(Salaire $salaire){


        return $this->render('fiche/showSalaire.html.twig',[
            'salaire'=>$salaire
        ]);
    }
    /**
     * @Route("/fiche/showRappel{id}", name="fiche_showRappel" )
     */

    public function showRappel(Rappel $rappel){


        return $this->render('fiche/showRappel.html.twig',[
            'rappel'=>$rappel
        ]);
    }

    /**
     * @Route("/fiche/showPosteDeTravail{id}", name="fiche_showPosteDeTravail" )
     */

    public function showPosteDeTravail(PosteDeTravail $posteDeTravail){


        return $this->render('fiche/showPosteDeTravail.html.twig',[
            'posteDeTravail'=>$posteDeTravail
        ]);
    }

    /**
     * @Route("/fiche/showPoste{id}", name="fiche_showPoste" )
     */

    public function showPoste(Poste $poste){


        return $this->render('fiche/showPoste.html.twig',[
            'poste'=>$poste
        ]);
    }

    /**
     * @Route("/fiche/showPartResponsablePaiement{id}", name="fiche_showPartResponsablePaiement" )
     */

    public function showPartResponsablePaiement(PartResponsablePayement $partResponsablePayement){


        return $this->render('fiche/showPartResponsablePaiement.html.twig',[
            'partResponsablePayement'=>$partResponsablePayement
        ]);
    }

    /**
     * @Route("/fiche/showDelegation{id}", name="fiche_showDelegation" )
     */

    public function showDelegation(Delegation $delegation){


        return $this->render('fiche/showDelegation.html.twig',[
            'delegation'=>$delegation
        ]);
    }

    /**
     * @Route("/fiche/showCharge{id}", name="fiche_showCharge" )
     */

    public function showCharge(Charge $charge){


        return $this->render('fiche/showCharge.html.twig',[
            'charge'=>$charge
        ]);
    }

    /**
     * @Route("/fiche/showBanque{id}", name="fiche_showBanque" )
     */

    public function showBanque(Banque $banque){


        return $this->render('fiche/showBanque.html.twig',[
            'banque'=>$banque
        ]);
    }

    /**
     * @Route("/fiche/showAttestationTravail{id}", name="fiche_showAttestationTravail" )
     */

    public function showAttestationTravail(AttestationTravail $attestationTravail){


        return $this->render('fiche/showAttestationTravail.html.twig',[
            'attestationTravail'=>$attestationTravail
        ]);
    }

    /**
     * @Route("/fiche/showAttestationArretTravail{id}", name="fiche_showAttestationArretTravail" )
     */

    public function showAttestationArretTravail(AttestationArretTravail $attestationArretTravail){


        return $this->render('fiche/showAttestationArretTravail.html.twig',[
            'attestationArretTravail'=> $attestationArretTravail
        ]);
    }

    /**
     * @Route("/fiche/showArrondissement{id}", name="fiche_showArrondissement" )
     */

    public function showArrondissement(Arrondissement $arrondissement){


        return $this->render('fiche/showArrondissement.html.twig', array('arrondissement'=> $arrondissement)

        );
    }



    /**
     * @Route("/fiche/deleteBanque/{id}", name="fiche_deleteBanque")
     * @Method({"DELETE"})
     */
    public function deleteBanque(Request $request, Banque $banque): Response
    {
        if ($this->isCsrfTokenValid('delete'.$banque->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($banque);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/fiche/deleteSalaire/{id}", name="fiche_deleteSalaire")
     * @Method({"DELETE"})
     */
    public function deleteSalaire(Request $request, Salaire $salaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$salaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($salaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/fiche/deleteRappel/{id}", name="fiche_deleteRappel")
     * @Method({"DELETE"})
     */
    public function deleteRappel(Request $request, Rappel $rappel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rappel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rappel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/fiche/deletePosteDeTravail/{id}", name="fiche_deletePosteDeTravail")
     * @Method({"DELETE"})
     */
    public function deletePosteDeTreavail(Request $request, PosteDeTravail $posteDeTravail): Response
    {
        if ($this->isCsrfTokenValid('delete'.$posteDeTravail->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($posteDeTravail);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/fiche/deletePoste/{id}", name="fiche_deletePoste")
     * @Method({"DELETE"})
     */
    public function deletePoste(Request $request, Poste $poste): Response
    {
        if ($this->isCsrfTokenValid('delete'.$poste->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($poste);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/fiche/deletePartResponsablePayement/{id}", name="fiche_deletePartResponsablePayement")
     * @Method({"DELETE"})
     */
    public function deletePartResponsablePayement(Request $request, PartResponsablePayement $partResponsablePayement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$partResponsablePayement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($partResponsablePayement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/fiche/deleteEmploye/{id}", name="fiche_deleteEmploye")
     * @Method({"DELETE"})
     */
    public function deleteEmploye(Request $request, Employe $employe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$employe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($employe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/fiche/deleteDelegation/{id}", name="fiche_deleteDelegation")
     * @Method({"DELETE"})
     */
    public function deleteDelegation(Request $request, Delegation $delegation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$delegation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($delegation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/fiche/deleteCharge/{id}", name="fiche_deleteCharge")
     * @Method({"DELETE"})
     */
    public function deleteCharge(Request $request, Charge $charge): Response
    {
        if ($this->isCsrfTokenValid('delete'.$charge->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($charge);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/fiche/deleteAttestationTravail/{id}", name="fiche_deleteAttestationTravail")
     * @Method({"DELETE"})
     */
    public function deleteAttestationTravail(Request $request, AttestationTravail $attestationTravail): Response
    {
        if ($this->isCsrfTokenValid('delete'.$attestationTravail->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($attestationTravail);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/fiche/deleteAttestationArretTravail/{id}", name="fiche_deleteAttestationArretTravail")
     * @Method({"DELETE"})
     */
    public function deleteAttestationArretTravail(Request $request, AttestationArretTravail $attestationArretTravail): Response
    {
        if ($this->isCsrfTokenValid('delete'.$attestationArretTravail->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($attestationArretTravail);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/fiche/deleteArrondissement/{id}", name="fiche_deleteArrondissement")
     * @Method({"DELETE"})
     */
    public function deleteArrondissement(Request $request, Arrondissement $arrondissement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$arrondissement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($arrondissement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('home');
    }
    public function list(LoggerInterface $logger)
    {
        $logger->info('Look! I just used a service');

        // ...
    }
    public function new(UserLog $userLog , User $user)
    {


        $user = $userLog->getUser();
        $this->addFlash('success', $user);

    }











}
