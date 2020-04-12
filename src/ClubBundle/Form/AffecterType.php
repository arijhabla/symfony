<?php

namespace ClubBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AffecterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomClub',EntityType::class,array(
                'class'=>"ClubBundle:Club",
                'choice_label'=>'nom',
                'attr'=>['class'=>'form-control']
            ))
            ->add('nomEvenement',EntityType::class,array(
                'class'=>"ClubBundle:Evenement",
                'choice_label'=>'nom',
                'attr'=>['class'=>'form-control']
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ClubBundle\Entity\Affecter'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'clubbundle_affecter';
    }


}
