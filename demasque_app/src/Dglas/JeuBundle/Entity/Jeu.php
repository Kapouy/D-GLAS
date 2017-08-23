<?php

namespace Dglas\JeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jeu
 *
 * @ORM\Table(name="jeu")
 * @ORM\Entity(repositoryClass="Dglas\JeuBundle\Repository\JeuRepository")
 */
class Jeu
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
     * @var NommenclatureJeu
     *
     * @ORM\ManyToOne(targetEntity="NommenclatureJeu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nommenclatureJeu;

    /**
     * @var Proprietaire
     *
     * @ORM\ManyToOne(targetEntity="Proprietaire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $proprietaire;

    /**
     * @var EtatJeu
     *
     * @ORM\ManyToMany(targetEntity="EtatJeu",cascade={"persist"})
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
     * Set nommenclatureJeu
     *
     * @param NommenclatureJeu $nommenclatureJeu
     *
     * @return Jeu
     */
    public function setNommenclatureJeu(NommenclatureJeu $nommenclatureJeu)
    {
        $this->nommenclatureJeu = $nommenclatureJeu;
        return $this;
    }

    /**
     * Get nommenclatureJeu
     *
     * @return NommenclatureJeu
     */
    public function getNommenclatureJeu()
    {
        return $this->nommenclatureJeu;
    }

    /**
     * Set proprietaire
     *
     * @param Proprietaire $proprietaire
     *
     * @return Jeu
     */
    public function setProprietaire(Proprietaire $proprietaire)
    {
        $this->proprietaire = $proprietaire;
        return $this;
    }

    /**
     * Get proprietaire
     *
     * @return Proprietaire
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
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
     * @return Jeu
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
