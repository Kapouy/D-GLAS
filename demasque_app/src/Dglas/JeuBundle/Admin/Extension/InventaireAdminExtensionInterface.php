<?php
/**
 * Created by PhpStorm.
 * User: aurel
 * Date: 04/10/2017
 * Time: 20:49
 */

namespace Dglas\JeuBundle\Admin\Extension;


use Dglas\JeuBundle\Entity\EtatJeu;
use Dglas\JeuBundle\Entity\Inventaire;
use Dglas\JeuBundle\Entity\Jeu;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AdminExtensionInterface;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\CoreBundle\Validator\ErrorElement;

class InventaireAdminExtensionInterface implements AdminExtensionInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var EtatJeu[]
     */
    protected $etats;

    /**
     * InventaireAdminExtensionInterface constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param FormMapper $formMapper
     */
    public function configureFormFields(FormMapper $formMapper)
    {
        // TODO: Implement configureFormFields() method.
    }

    /**
     * @param ListMapper $listMapper
     */
    public function configureListFields(ListMapper $listMapper)
    {
        // TODO: Implement configureListFields() method.
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    public function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        // TODO: Implement configureDatagridFilters() method.
    }

    /**
     * @param ShowMapper $showMapper
     */
    public function configureShowFields(ShowMapper $showMapper)
    {
        // TODO: Implement configureShowFields() method.
    }

    /**
     * @param AdminInterface $admin
     * @param RouteCollection $collection
     */
    public function configureRoutes(AdminInterface $admin, RouteCollection $collection)
    {
        // TODO: Implement configureRoutes() method.
    }

    /**
     * DEPRECATED: Use configureTabMenu instead.
     *
     * NEXT_MAJOR: remove this method.
     *
     * @param AdminInterface $admin
     * @param MenuItemInterface $menu
     * @param string $action
     * @param AdminInterface $childAdmin
     *
     * @deprecated
     */
    public function configureSideMenu(AdminInterface $admin, MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        // TODO: Implement configureSideMenu() method.
    }

    /**
     * Builds the tab menu.
     *
     * @param AdminInterface $admin
     * @param MenuItemInterface $menu
     * @param string $action
     * @param AdminInterface $childAdmin
     */
    public function configureTabMenu(AdminInterface $admin, MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        // TODO: Implement configureTabMenu() method.
    }

    /**
     * @param AdminInterface $admin
     * @param ErrorElement $errorElement
     * @param mixed $object
     */
    public function validate(AdminInterface $admin, ErrorElement $errorElement, $object)
    {
    }

    /**
     * @param AdminInterface $admin
     * @param ProxyQueryInterface $query
     * @param string $context
     */
    public function configureQuery(AdminInterface $admin, ProxyQueryInterface $query, $context = 'list')
    {
    }

    /**
     * Get a chance to modify a newly created instance.
     *
     * @param AdminInterface $admin
     * @param Inventaire $object
     */
    public function alterNewInstance(AdminInterface $admin, $object)
    {   
    }

    /**
     * Get a chance to modify object instance.
     *
     * @param AdminInterface $admin
     * @param mixed $object
     */
    public function alterObject(AdminInterface $admin, $object)
    {
    }

    /**
     * Get a chance to add persistent parameters.
     *
     * @param AdminInterface $admin
     *
     * @return array
     */
    public function getPersistentParameters(AdminInterface $admin)
    {
        return [];
    }

    /**
     * @param AdminInterface $admin
     * @param mixed $object
     */
    public function preUpdate(AdminInterface $admin, $object)
    {
    }

    /**
     * @param AdminInterface $admin
     * @param mixed $object
     */
    public function postUpdate(AdminInterface $admin, $object)
    {
    }

    /**
     * @param AdminInterface $admin
     * @param Inventaire $object
     */
    public function prePersist(AdminInterface $admin, $object)
    {
    }

    /**
     * @param AdminInterface $admin
     * @param Inventaire $object
     */
    public function postPersist(AdminInterface $admin, $object)
    {
        $repoJeu = $this->entityManager->getRepository(Jeu::class);
        $listJeux = $repoJeu->findAll();
		// $listJeux = $repoJeu->rechercherListeInventaire();	

			echo sizeof($listJeux);
		
        $etatDefaut = $this->entityManager->getRepository('DglasJeuBundle:NommenclatureEtat')->find(10);

        foreach ($listJeux as $boite) {
            $etatJeu = new EtatJeu();

            $precedentEtat = $boite->getLastEtatJeu();

            $etatJeu->setDate(new \DateTime())
            ->setFlagInventaire(true)
            ->setJeu($boite)
            ->setInventaire($object);

            if ($precedentEtat == null) {
                $etatJeu
                ->setJouable(true)
                ->setPiecesManquantes(false)
                ->setNommenclatureEtat($etatDefaut)
                ->setCommentaire('Inventaire')
                ;
            } else {
                $etatJeu
                ->setJouable($precedentEtat->getJouable())
                ->setPiecesManquantes($precedentEtat->getPiecesManquantes())
                ->setNommenclatureEtat($precedentEtat->getNommenclatureEtat())
                ->setCommentaire('Inventaire - '.$precedentEtat->getCommentaire())
                ;
            }

			if ($precedentEtat == null || $precedentEtat->getNommenclatureEtat()->isInventoriable()) {
				$boite->addEtatJeu($etatJeu);
				$this->entityManager->persist($etatJeu);
            
				$object->addEtatJeu($etatJeu);				
			}
        }
        $this->entityManager->persist($object);
        $this->entityManager->flush();
    }

    /**
     * @param AdminInterface $admin
     * @param mixed $object
     */
    public function preRemove(AdminInterface $admin, $object)
    {
    }

    /**
     * @param AdminInterface $admin
     * @param mixed $object
     */
    public function postRemove(AdminInterface $admin, $object)
    {
    }
}