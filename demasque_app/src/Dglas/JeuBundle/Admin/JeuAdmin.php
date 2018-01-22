<?php

namespace Dglas\JeuBundle\Admin;

use Dglas\JeuBundle\Entity\Jeu;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
    protected $datagridValues = [

        // display the first page (default = 1)
        '_page' => 1,

        // reverse order (default = 'ASC')
        '_sort_order' => 'DESC',

        // name of the ordered field (default = the model's id field, if any)
        '_sort_by' => 'idPhysique',
    ];

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idPhysique')
            ->add('nommenclatureJeu.nom', null, ['label' => 'Nom', 'show_filter' => true])
            ->add('etatJeu.flagInventaire', null, ['label' => 'En attente de validation'])
            ->add('proprietaire.nom', null, ['label' => 'Proprietaire']);
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idPhysique')
            ->add('nommenclatureJeu.nom', null, ['label' => 'Nom'])
            ->add('proprietaire.nom', null, ['label' => 'Proprietaire'])
            ->add('etatString', null, ['label' => 'Etat'])
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                ),
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Boite de jeu', ['class' => 'col-md-4'])
                ->add('nommenclatureJeu', 'sonata_type_model', [
                    'class' => 'Dglas\JeuBundle\Entity\NommenclatureJeu',
                    'property' => 'nom',
                    'label' => 'Nom'
                ])
                ->add('idPhysique')
                ->add('proprietaire', 'sonata_type_model', [
                    'class' => 'Dglas\JeuBundle\Entity\Proprietaire',
                    'property' => 'nom',
                    'label' => 'Nom'
                ])
            ->end()
            ->with('Etats', ['class' => 'col-md-6'])
                ->add('etatJeu', CollectionType::class, array(
                    'entry_type' => EtatJeuType::class,
                    'label' => 'Etat',
                    'entry_options' => array(
                        'attr' => array('class' => 'Dglas\JeuBundle\Entity\EtatJeu')
                    ),
                    'allow_add' => true
                ))
            ->end()
            ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
        ->with('Boite de jeu', ['class'=>'col-md-4'])
            ->add('idPhysique')
            ->add('nommenclatureJeu.nom', null, ['label' => 'Nom'])
            ->add('proprietaire.nom', null, ['label' => 'Proprietaire'])
        ->end()
        
        ->with('Historique des états', ['class'=>'col-md-6'])
            ->add('etatJeu', 'sonata_type_model', [
                'class' => 'AppBundle\Entity\EtatJeu',
                'associated_property' => 'dateEtatString'
            ])
        ->end()

        ->with('Historique des mouvements', ['class'=>'col-md-6'])
            ->add('mouvementJeu', null, array(
                'label' => 'Mouvements',
                'associated_property' => 'stringInfoMouvement')
            )
        ->end()
        ;
    }
}
