<?php

namespace EleveBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EleveType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user',EntityType::class,array(
                'class'=>"AppBundle:User",
                'choice_label'=>'id',
                'attr'=>['class'=>' form-control']
            ))
            ->add('nom',TextType::class, ['attr'=>['class'=>'form-control']])
            ->add('prenom',TextType::class, ['attr'=>['class'=>'form-control']])
            ->add('tel',TextType::class, ['attr'=>['class'=>'form-control']])
            ->add('emailEleve',TextType::class, ['attr'=>['class'=>'form-control']]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EleveBundle\Entity\Eleve'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'elevebundle_eleve';
    }


}
