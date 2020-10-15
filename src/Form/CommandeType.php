<?php

namespace App\Form;

use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',null,[
                'required' => true
            ])
            ->add('prenom',null,[
                'required'=> true
                ])
            ->add('telephone',null,[
                'required'=> true
            ])
            ->add('email',null,[
                'required'=> true
            ])
            ->add('adresse',null,[
                'required'=> true
            ])
            ->add('BP',null,[
                'required'=> true,
                'label' => 'Boite postale'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
