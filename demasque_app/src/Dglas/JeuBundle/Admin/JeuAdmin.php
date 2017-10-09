<?php

namespace Dglas\JeuBundle\Admin;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Dglas\JeuBundle\Form\EtatJeuType;

class JeuAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        ->add('idPhysique')
        ->add('nommenclatureJeu.nom')
        ->add('proprietaire.nom')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->add('idPhysique')
        ->add('nommenclatureJeu.nom')
        ->add('proprietaire.nom')
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
                'choice_label' => 'nom'
            ))
            ->add('idPhysique')
            ->add('proprietaire', 'entity', array(
                'class' => 'Dglas\JeuBundle\Entity\Proprietaire',
                'choice_label' => 'nom',
            ))
            //->add('etatJeux', CollectionType::class, array(
            //    'entry_type' => EtatJeuType::class,
             //   'entry_options' => array (
              //      'attr' => array('class' => 'Dglas\JeuBundle\Entity\EtatJeu')
               // ),
               // 'allow_add' => true
                
            //))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
        ->add('idPhysique')
        ->add('nommenclatureJeu.nom')
        ->add('proprietaire.nom')
        ->add('etatJeu', null, array(
            'associated_property' => 'stringDateEtat')
        )
        ;
    }}
