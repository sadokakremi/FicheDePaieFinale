<?php

namespace App\Form;

use App\Entity\AttestationArretTravail;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AttestationArretTravailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date_saisie')
            ->add('date_arret')
            ->add('condition_arret')
            ->add('employe')
            ->add('partresponsablepayement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AttestationArretTravail::class,
        ]);
    }
}
