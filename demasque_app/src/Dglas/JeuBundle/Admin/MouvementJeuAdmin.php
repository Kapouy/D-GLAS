<?php

namespace Dglas\JeuBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Dglas\JeuBundle\Form\JeuType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class MouvementJeuAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('dateMouvement')
            ->add('gestionnaireJeu.nom')
            ->add('dateRetourPrevu')
            ->add('destination.nom')
            ->add('commentaire')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->add('id')
        ->add('dateMouvement')
        ->add('gestionnaireJeu.nom')
        ->add('dateRetourPrevu')
        ->add('destination.nom')
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
            ->add('dateMouvement', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'data' => new \DateTime(),
            ))
            ->add('dateRetourPrevu', DateType::class, array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'data' => new \DateTime(),
            ))
            ->add('gestionnaireJeu', 'entity', array(
                'class' => 'Dglas\JeuBundle\Entity\GestionnaireJeu',
                'choice_label' => 'nom',
            ))
            ->add('commentaire')
            ->add('destination', 'entity', array(
                'class' => 'Dglas\JeuBundle\Entity\Lieu',
                'choice_label' => 'nom',
            ))
            ->add('jeux', 'entity', array(
                'class' => 'Dglas\JeuBundle\Entity\Jeu',
                'choice_label' => 'nomJeuNomProprietaire',
                'expanded' => true,
                'multiple' => true
            ))
            ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('dateMouvement')
            ->add('gestionnaireJeu.nom')
            ->add('dateRetourPrevu')
            ->add('destination.nom')
            ->add('jeux', null, array(
                'associated_property' => 'nomJeuNomProprietaire')
            )
        ;
    }
}
