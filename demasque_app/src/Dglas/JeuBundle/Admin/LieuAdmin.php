<?php

namespace Dglas\JeuBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sonata\AdminBundle\Show\ShowMapper;

class LieuAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            ->add('lieuParent.nom')
            ->add('jeuUtilisable')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('nom')
            ->add('lieuParent.nom')
            ->add('jeuUtilisable')
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
            ->add('nom')
            ->add('lieuParent', 'entity', array(
                'class' => 'Dglas\JeuBundle\Entity\Lieu',
                'choice_label' => 'nom',
                'required' => false,
            ))
            ->add('jeuUtilisable', CheckboxType::class, array(
                'required' => false,
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('nom')
            ->add('lieuParent.nom')
            ->add('jeuUtilisable')
            ->add('lieuFils', null, array(
                'associated_property' => 'nom')
            )
        ;
    }
}
