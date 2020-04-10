<?php

namespace RHBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CondidatType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cin',TextType::class,['attr'=>['class'=>'dsX700']])
            ->add('nom',TextType::class,['attr'=>['class'=>'dsX700']])
            ->add('prenom',TextType::class,['attr'=>['class'=>'dsX700']])
            ->add('age',TextType::class,['attr'=>['class'=>'dsX700']])
            ->add('experienceCondidat',TextType::class,['attr'=>['class'=>'dsX700']]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RHBundle\Entity\Condidat'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'rhbundle_condidat';
    }


}
