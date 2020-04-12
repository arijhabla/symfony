<?php

namespace ExamenBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NoteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idEleve',EntityType::class,array(
                'class'=>"EleveBundle:Eleve",
                'choice_label'=>'emailEleve',
                'attr'=>['class'=>'form-control']
            ))
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
            ->add('note',TextType::class, ['attr'=>['class'=>'form-control']])
            ->add('date',DateType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ExamenBundle\Entity\Note'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'examenbundle_note';
    }


}
