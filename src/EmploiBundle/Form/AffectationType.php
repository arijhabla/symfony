<?php

namespace EmploiBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AffectationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomClasse',EntityType::class,array(
                'class'=>"EmploiBundle:Classe",
                'choice_label'=>'niveau',
                'attr'=>['class'=>'form-control']
            ))
            ->add('idSalle',EntityType::class,array(
                'class'=>"EmploiBundle:Salle",
                'choice_label'=>'id',
                'attr'=>['class'=>'form-control']
            ))
            ->add('nomMAt',EntityType::class,array(
                'class'=>"EmploiBundle:Matiere",
                'choice_label'=>'nom_matiere',
                'attr'=>['class'=>'form-control']
            ))

            ->add('heure',TextType::class, ['attr'=>['class'=>'form-control']])
            ->add('date',DateType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EmploiBundle\Entity\Affectation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'emploibundle_affectation';
    }


}
