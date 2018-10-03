<?php

namespace Dglas\JeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lieu
 *
 * @ORM\Table(name="lieu")
 * @ORM\Entity(repositoryClass="Dglas\JeuBundle\Repository\LieuRepository")
 */
class Lieu
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
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var bool
     *
     * @ORM\Column(name="jeuUtilisable", type="boolean")
     */
    private $jeuUtilisable;

    /**
     * @var Lieu
     *
     * @ORM\ManyToOne(targetEntity="Lieu") 
     * @ORM\JoinColumn(nullable=true)
     */
    private $lieuParent;


    /**
     * @var Lieu
     *
     * @ORM\OneToMany(targetEntity="Lieu", mappedBy="lieuParent", fetch="EAGER")
     * @ORM\JoinColumn(nullable=true)
     */
     private $lieuFils;

     
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
     * @return Lieu
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
     * Set jeuUtilisable
     *
     * @param boolean $jeuUtilisable
     *
     * @return Lieu
     */
    public function setJeuUtilisable($jeuUtilisable)
    {
        $this->jeuUtilisable = $jeuUtilisable;

        return $this;
    }

    /**
     * Get jeuUtilisable
     *
     * @return bool
     */
    public function getJeuUtilisable()
    {
        return $this->jeuUtilisable;
    }

    /**
     * Set lieuParent
     *
     * @param Lieu $lieuParent
     *
     * @return Lieu
     */
    public function setLieuParent(Lieu $lieuParent)
    {
        $this->lieuParent = $lieuParent;

        return $this;
    }

    /**
     * Get lieuParent
     *
     * @return Lieu
     */
    public function getLieuParent()
    {
        return $this->lieuParent;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->lieuFils = new \Doctrine\Common\Collections\ArrayCollection();
		$this->jeuUtilisable = true;
    }

	public function __toString() {
		if ($this->getLieuParent() != null) {
			return $this->getLieuParent()->getNom().'-'.$this->nom;
		}
		return ''.$this->nom;
	}
	
    /**
     * Add lieuFil
     *
     * @param \Dglas\JeuBundle\Entity\Lieu $lieuFil
     *
     * @return Lieu
     */
    public function addLieuFil(\Dglas\JeuBundle\Entity\Lieu $lieuFil)
    {
        $this->lieuFils[] = $lieuFil;

        return $this;
    }

    /**
     * Remove lieuFil
     *
     * @param \Dglas\JeuBundle\Entity\Lieu $lieuFil
     */
    public function removeLieuFil(\Dglas\JeuBundle\Entity\Lieu $lieuFil)
    {
        $this->lieuFils->removeElement($lieuFil);
    }

    /**
     * Get lieuFils
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLieuFils()
    {
        return $this->lieuFils;
    }
}
