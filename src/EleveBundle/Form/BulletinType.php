<?php

namespace EleveBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BulletinType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idEleve',EntityType::class,array(
            'class'=>"EleveBundle:Eleve",
            'choice_label'=>'id',
            'attr'=>['class'=>'form-control']
        ))
            ->add('idClasse',EntityType::class,array(
                'class'=>"EmploiBundle:Classe",
                'choice_label'=>'id',
                'attr'=>['class'=>'form-control']
            ))
            ->add('idMatiere',EntityType::class,array(
                'class'=>"EmploiBundle:Matiere",
                'choice_label'=>'id',
                'attr'=>['class'=>'form-control']
            ))
            ->add('moyenne',TextType::class, ['attr'=>['class'=>'form-control']]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EleveBundle\Entity\Bulletin'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'elevebundle_bulletin';
    }


}
