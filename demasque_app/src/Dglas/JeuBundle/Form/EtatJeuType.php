<?php

namespace Dglas\JeuBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EtatJeuType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder 
        ->add('date', DateType::class, array(
            'widget' => 'single_text',
            'format' => 'dd/MM/yyyy',
            'data' => new \DateTime(),
        ))
        ->add('commentaire')
        // ->add('jeu', 'entity', array(
        //     'class' => 'Dglas\JeuBundle\Entity\Jeu',
        //     'choice_label' => 'nom',
        // ))
        ->add('nommenclatureEtat', 'entity', array(
            'class' => 'Dglas\JeuBundle\Entity\NommenclatureEtat',
            'choice_label' => 'nom',
        ))
        ->add('jouable', CheckboxType::class, array(
                'data' => true,
            ))
        ->add('piecesManquantes');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dglas\JeuBundle\Entity\EtatJeu'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'dglas_jeubundle_etatjeu';
    }


}
