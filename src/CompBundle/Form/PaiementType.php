<?php

namespace CompBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaiementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idEleve',EntityType::class,array(
                'class'=>"EleveBundle:Eleve",
                'choice_label'=>'id',
                'attr'=>['class'=>'form-control']
            ))
            ->add('typePaiement',ChoiceType::class, ['attr'=>['class'=>'form-control'],
                'choices'  => [
                'En especes' => 'En especes',
                'Carte Bancaire' => 'Carte Bancaire',
                    'Check ' => 'Check ',
                    'Virement' => 'Virement',

            ]])
            ->add('montant',NumberType::class, ['attr'=>['class'=>'form-control']]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CompBundle\Entity\Paiement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'compbundle_paiement';
    }


}
