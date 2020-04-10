<?php

namespace EleveBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AbsenceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idMatiere',EntityType::class,array(
                'class'=>"EmploiBundle:Matiere",
                'choice_label'=>'id',
                'attr'=>['class'=>'form-control']
            ))

            ->add('nomEleve',EntityType::class,array(
                'class'=>"EleveBundle:Eleve",
                'choice_label'=>'nom',
                'attr'=>['class'=>'form-control']
            ))

            ->add('dateAbsence',DateType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EleveBundle\Entity\Absence'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'elevebundle_absence';
    }


}
