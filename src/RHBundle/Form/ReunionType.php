<?php

namespace RHBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReunionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idEnseignant',EntityType::class,array(
                'class'=>"RHBundle:Employe",
                'choice_label'=>'id',
                'attr'=>['class'=>'form-control']
            ))
            ->add('idSalle',EntityType::class,array(
                'class'=>"EmploiBundle:Salle",
                'choice_label'=>'id',
                'attr'=>['class'=>'form-control']
            ))
            ->add('idClasse',EntityType::class,array(
                'class'=>"EmploiBundle:Classe",
                'choice_label'=>'id',
                'attr'=>['class'=>'form-control']
            ))
            ->add('date',DateType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RHBundle\Entity\Reunion'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'rhbundle_reunion';
    }


}
