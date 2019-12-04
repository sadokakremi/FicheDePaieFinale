<?php

namespace App\Form;

use App\Entity\Salaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Salaire1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type_de_paiement')
            ->add('categorie_salaire')
            ->add('montant_salaire')
            ->add('date_attribution_salaire')
            ->add('nbre_heures_travail')
            ->add('bulletin')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Salaire::class,
        ]);
    }
}
