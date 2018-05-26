<?php

namespace Dglas\JeuBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Dglas\JeuBundle\Entity\EtatJeu;

use Symfony\Component\Form\Extension\Core\Type\DateType;

class InventaireAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('date')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('date')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
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
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
        
            ->add('date')
            ->add('etatJeu', null, array(
                'label' => 'Jeu a valider',
                'associated_property' => 'stringInventaire')
        )
            ;
        ;
    }
}
