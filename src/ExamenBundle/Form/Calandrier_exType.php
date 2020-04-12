<?php

namespace ExamenBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Calandrier_exType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idExamen',EntityType::class,array(
                'class'=>"ExamenBundle:Examen",
                'choice_label'=>'id',
                'attr'=>['class'=>'form-control']
            ))
            ->add('idMatiere',EntityType::class,array(
                'class'=>"EmploiBundle:Matiere",
                'choice_label'=>'nom_matiere',
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
            ->add('dateEx',DateType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ExamenBundle\Entity\Calandrier_ex'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'examenbundle_calandrier_ex';
    }


}
