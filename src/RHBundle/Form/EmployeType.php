<?php

namespace RHBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class EmployeType extends AbstractType
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
            ->add('age',NumberType::class, ['attr'=>['class'=>'form-control']])
            ->add('role',ChoiceType::class, ['attr'=>['class'=>'form-control'],'choices'  => [
                'Enseignant' => 'Enseignant',
                'Responsable RH' => 'Responsable RH',
                ]])
            ->add('nbrHeure',NumberType::class, ['attr'=>['class'=>'form-control']])
            ->add('prime',NumberType::class, ['attr'=>['class'=>'form-control']])
            ->add('salaire',NumberType::class, ['attr'=>['class'=>'form-control']]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RHBundle\Entity\Employe'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'rhbundle_employe';
    }


}
