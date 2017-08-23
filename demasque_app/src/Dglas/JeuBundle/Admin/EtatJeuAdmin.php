<?php

namespace Dglas\JeuBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EtatJeuAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('date')
            ->add('commentaire')
            ->add('jouable')
            ->add('piecesManquantes')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('date')
            ->add('commentaire')
            ->add('jouable')
            ->add('piecesManquantes')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                ),
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
        ->add('date', DateType::class, array(
            'widget' => 'single_text',
            'format' => 'dd/MM/yyyy',
            'data' => new \DateTime(),
        ))
        ->add('commentaire')
        ->add('jeu', 'entity', array(
            'class' => 'Dglas\JeuBundle\Entity\Jeu',
            'choice_label' => 'nom',
        ))
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
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('date')
            ->add('commentaire')
            ->add('jouable')
            ->add('piecesManquantes')
        ;
    }
}
