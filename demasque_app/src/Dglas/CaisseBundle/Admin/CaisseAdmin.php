<?php

namespace Dglas\CaisseBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CaisseAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('dateCaisse')
            ->add('benevole')
            ->add('fond10')
            ->add('fond5')
            ->add('fond2')
            ->add('fond1')
            ->add('fond05')
            ->add('fond02')
            ->add('fond01')
            ->add('caisse100')
            ->add('caisse50')
            ->add('caisse20')
            ->add('caisse10')
            ->add('caisse5')
            ->add('caisse2')
            ->add('caisse1')
            ->add('caisse05')
            ->add('caisse02')
            ->add('caisse01')
            ->add('caisse005')
            ->add('caisse002')
            ->add('caisse001')
            ->add('caisseCB')
            ->add('cheque')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('dateCaisse')
            ->add('benevole')
            ->add('fond10')
            ->add('fond5')
            ->add('fond2')
            ->add('fond1')
            ->add('fond05')
            ->add('fond02')
            ->add('fond01')
            ->add('caisse100')
            ->add('caisse50')
            ->add('caisse20')
            ->add('caisse10')
            ->add('caisse5')
            ->add('caisse2')
            ->add('caisse1')
            ->add('caisse05')
            ->add('caisse02')
            ->add('caisse01')
            ->add('caisse005')
            ->add('caisse002')
            ->add('caisse001')
            ->add('caisseCB')
            ->add('cheque')
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
            ->add('id')
            ->add('dateCaisse')
            ->add('benevole')
            ->add('fond10')
            ->add('fond5')
            ->add('fond2')
            ->add('fond1')
            ->add('fond05')
            ->add('fond02')
            ->add('fond01')
            ->add('caisse100')
            ->add('caisse50')
            ->add('caisse20')
            ->add('caisse10')
            ->add('caisse5')
            ->add('caisse2')
            ->add('caisse1')
            ->add('caisse05')
            ->add('caisse02')
            ->add('caisse01')
            ->add('caisse005')
            ->add('caisse002')
            ->add('caisse001')
            ->add('caisseCB')
            ->add('cheque')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('dateCaisse')
            ->add('benevole')
            ->add('fond10')
            ->add('fond5')
            ->add('fond2')
            ->add('fond1')
            ->add('fond05')
            ->add('fond02')
            ->add('fond01')
            ->add('caisse100')
            ->add('caisse50')
            ->add('caisse20')
            ->add('caisse10')
            ->add('caisse5')
            ->add('caisse2')
            ->add('caisse1')
            ->add('caisse05')
            ->add('caisse02')
            ->add('caisse01')
            ->add('caisse005')
            ->add('caisse002')
            ->add('caisse001')
            ->add('caisseCB')
            ->add('cheque')
        ;
    }
}
