<?php
/**
 * Created by PhpStorm.
 * User: aurel
 * Date: 04/10/2017
 * Time: 20:49
 */

namespace Dglas\JeuBundle\Admin\Extension;


use Dglas\JeuBundle\Entity\EtatJeu;
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

class JeuAdminExtensionInterface implements AdminExtensionInterface
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
     * JeuAdminExtensionInterface constructor.
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
     * @param Jeu $object
     */
    public function alterNewInstance(AdminInterface $admin, $object)
    {
        $etatJeu = new EtatJeu();
        $etatJeu->setDate(new \DateTime())
            ->setJouable(true)
            ->setNommenclatureEtat($this->entityManager->getRepository('DglasJeuBundle:NommenclatureEtat')->find(10))
            ->setJeu($object);

        $object->addEtatJeu($etatJeu);

        $repo = $this->entityManager->getRepository(Jeu::class);
        
        $query = $repo->createQueryBuilder('s');
        $query->select('MAX(s.idPhysique)+1 as valeur');
        $newId = $query->getQuery()->getResult();

        $object->setIdPhysique($newId[0]['valeur']);
        
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
     * @param Jeu $object
     */
    public function prePersist(AdminInterface $admin, $object)
    {
        if ($object->getEtatJeu()) {
            foreach($object->getEtatJeu() as $etatJeu) {
                $etatJeu->setJeu($object);
            }
        }
    }

    /**
     * @param AdminInterface $admin
     * @param Jeu $object
     */
    public function postPersist(AdminInterface $admin, $object)
    {
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