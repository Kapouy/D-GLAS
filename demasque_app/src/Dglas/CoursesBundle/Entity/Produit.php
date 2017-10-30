<?php

namespace Dglas\CoursesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="Dglas\CoursesBundle\Repository\ProduitRepository")
 */
class Produit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, unique=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="qteCourante", type="integer")
     */
    private $qteCourante;

    /**
     * @var int
     *
     * @ORM\Column(name="qteAvertissement", type="integer")
     */
    private $qteAvertissement;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Produit
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produit
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set qteCourante
     *
     * @param integer $qteCourante
     *
     * @return Produit
     */
    public function setQteCourante($qteCourante)
    {
        $this->qteCourante = $qteCourante;

        return $this;
    }

    /**
     * Get qteCourante
     *
     * @return int
     */
    public function getQteCourante()
    {
        return $this->qteCourante;
    }

    /**
     * Set qteAvertissement
     *
     * @param integer $qteAvertissement
     *
     * @return Produit
     */
    public function setQteAvertissement($qteAvertissement)
    {
        $this->qteAvertissement = $qteAvertissement;

        return $this;
    }

    /**
     * Get qteAvertissement
     *
     * @return int
     */
    public function getQteAvertissement()
    {
        return $this->qteAvertissement;
    }
}

