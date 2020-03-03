<?php

namespace App\Form;

use App\Entity\Employe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EmployeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cin')
            ->add('cnss')
            ->add('nom')
            ->add('prenom')
            ->add('lieu_de_naissance')
            ->add('statut_familial')
            ->add('adresse')
            ->add('matricule')
            ->add('telephone')
            ->add('diplome')
            ->add('niveau_scolaire')
            ->add('age')
            ->add('date_de_naissance', DateType::class, [
                // renders it as a single text box
                'widget' => 'single_text',
            ])
            ->add('date_debut_travail')
            ->add('createdAt')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Employe::class,
        ]);
    }
}
