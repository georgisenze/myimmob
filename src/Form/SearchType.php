<?php

namespace App\Form;

use App\Classe\Search;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('string', TextType::class, [
            'label' => false,
            'required' => false,
            'attr' => [
                'placeholder' => 'Entrer un mot clé ...',
                'class' => 'form-control-sm'
            ]
        ])
        ->add('categories', EntityType::class, [
            'label' => false,
            'required' => false,
            'class' => Category::class,
            'multiple' => true,
            'expanded' => true,
        ])
            /* ->add('min', NumberType::class, [
                'label'=>false,
                'required'=>false,
                'attr' => [
                    'placeholder' => 'Prix minimal'
                ]
            ])
            ->add('max', NumberType::class, [
                'label'=>false,
                'required'=>false,
                'attr' => [
                    'placeholder' => 'Prix maximal'
                ]
            ]) */
        ->add('submit', SubmitType::class, [
            'label' => 'Rechercher la Propriété',
            'attr' => [
                'class' => 'btn btn-block btn-info'
            ]
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            // methode get pour passer les parametre dans l'url
            'methode' => 'GET',
            'crsf_protection' => false,
        ]);
    }

    // methode pour retirer le préfixe afin d'avoir des paramètres plus simple possible
    public function getBlockPrefix()
    {
        return '';
    }
}
