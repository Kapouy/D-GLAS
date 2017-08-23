<?php

namespace Dglas\JeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NommenclatureEtat
 *
 * @ORM\Table(name="nommenclature_etat")
 * @ORM\Entity(repositoryClass="Dglas\JeuBundle\Repository\NommenclatureEtatRepository")
 */
class NommenclatureEtat
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
     * @ORM\Column(name="nom", type="string", length=50, unique=true)
     */
    private $nom;

    /**
     * @var int
     *
     * @ORM\Column(name="ordre", type="integer")
     */
    private $ordre;

        /**
     * @var EtatJeu
     *
     * @ORM\ManyToMany(targetEntity="EtatJeu")
     * @ORM\JoinColumn(nullable=false)
     */
     private $etatJeu;

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
     * @return NommenclatureEtat
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
     * Set ordre
     *
     * @param integer $ordre
     *
     * @return NommenclatureEtat
     */
    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;

        return $this;
    }

    /**
     * Get ordre
     *
     * @return int
     */
    public function getOrdre()
    {
        return $this->ordre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->etatJeu = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add etatJeu
     *
     * @param \Dglas\JeuBundle\Entity\EtatJeu $etatJeu
     *
     * @return NommenclatureEtat
     */
    public function addEtatJeu(\Dglas\JeuBundle\Entity\EtatJeu $etatJeu)
    {
        $this->etatJeu[] = $etatJeu;

        return $this;
    }

    /**
     * Remove etatJeu
     *
     * @param \Dglas\JeuBundle\Entity\EtatJeu $etatJeu
     */
    public function removeEtatJeu(\Dglas\JeuBundle\Entity\EtatJeu $etatJeu)
    {
        $this->etatJeu->removeElement($etatJeu);
    }

    /**
     * Get etatJeu
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEtatJeu()
    {
        return $this->etatJeu;
    }
}
