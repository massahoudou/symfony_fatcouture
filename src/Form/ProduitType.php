<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',null,[
                'label' =>'Titre du produit',
                'required' => true,
            ])
            ->add('prix', null,[
                'label' => 'Prix du produit',
                'required'=> true
            ])
            ->add('description',null,[
                'required'=> true
            ])
             ->add('imagefile',FileType::class,[
        'required' => true
         ])
        
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
