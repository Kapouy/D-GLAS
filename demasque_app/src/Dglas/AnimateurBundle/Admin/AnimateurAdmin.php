<?php

namespace Dglas\AnimateurBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Symfony\Component\Form\Extension\Core\Type\DateType;

class AnimateurAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
			->add('user.lastname')
			->add('user.firstname')
            ->add('dateArrivee')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
			->add('user.lastname', null, ['label' => 'Nom'])
			->add('user.firstname', null, ['label' => 'Prenom'])
            ->add('dateArrivee', null, ['label' => 'Date d\'arrivée'])
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
		    ->add('user', 'entity', array(
                'class' => 'Application\Sonata\UserBundle\Entity\User',
                'choice_label' => function ($user) {
						return $user->getFirstname() . ' ' . $user->getLastname();
					},
            ))
			->add('dateArrivee', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
			->add('user.lastname', null, ['label' => 'Nom'])
			->add('user.firstname', null, ['label' => 'Prenom'])
            ->add('dateArrivee', null, ['label' => 'Date d\'arrivée'])
        ;
    }
}
