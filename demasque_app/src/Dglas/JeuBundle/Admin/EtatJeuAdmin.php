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

            ->add('date')
            ->add('nommenclatureEtat.nom', null, ['label' => 'Etat'])
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

            ->add('date')
            ->add('nommenclatureEtat.nom', null, ['label' => 'Etat'])
            ->add('jouable')
            ->add('piecesManquantes')
            ->add('commentaire')
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
            'disabled' => true,
        ))
        ->add('commentaire')
        ->add('jeu', null, array(
            'class' => 'Dglas\JeuBundle\Entity\Jeu',
            'choice_label' => 'nomJeuNomProprietaire',
            'disabled' => true,
        ))
        ->add('nommenclatureEtat', 'entity', array(
            'class' => 'Dglas\JeuBundle\Entity\NommenclatureEtat',
            'choice_label' => 'nom',
        ))
        ->add('jouable')
        ->add('piecesManquantes')
        ->add('flagInventaire', null, ['label' => 'Case à decocher pour valider l\'inventaire']);
        
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper

            ->add('jeu.proprietaire', 'entity', array(
                'class' => 'Dglas\JeuBundle\Entity\Proprietaire',
                'property' => 'nom'))
            ->add('date')
            ->add('nommenclatureEtat.nom')
            ->add('jouable')
            ->add('piecesManquantes')
            ->add('commentaire')
        ;
    }
}
