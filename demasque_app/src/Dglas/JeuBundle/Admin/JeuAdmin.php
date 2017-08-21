<?php

namespace Dglas\JeuBundle\Admin;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class JeuAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
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
            ->add('nommenclatureJeu', 'entity', array(
                'class' => 'Dglas\JeuBundle\Entity\NommenclatureJeu',
                'choice_label' => 'nom',
            ))
            ->add('proprietaire', 'entity', array(
                'class' => 'Dglas\JeuBundle\Entity\Proprietaire',
                'choice_label' => 'nom',
            ))
            ->add('etatJeu', CollectionType::class, array(
                'entry_type' => EtatJeu::class,
                'entry_options'  => array(
                    'attr'      => array('class' => 'email-box')
                ),
            ),
            array(
                'edit' => 'standard',
                'inline' => 'table',
                'sortable' => 'position',
                'limit' => 1
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
        ;
    }
}
