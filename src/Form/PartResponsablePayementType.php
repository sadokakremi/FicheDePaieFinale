<?php

namespace App\Form;

use App\Entity\PartResponsablePayement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PartResponsablePayementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom_employeur')
            ->add('adresse_employeur')
            ->add('telephone_employeur')
            ->add('email_employeur')
            ->add('banque')
            ->add('poste')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PartResponsablePayement::class,
        ]);
    }
}
