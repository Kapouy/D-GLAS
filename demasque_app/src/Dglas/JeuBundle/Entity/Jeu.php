<?php

namespace Dglas\JeuBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Dglas\JeuBundle\Entity\EtatJeu;
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
     * @var int
     *
     * @ORM\Column(name="idPhysique", type="integer")
     */
     private $idPhysique;

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
     * @ORM\OneToMany(targetEntity="EtatJeu", mappedBy="jeu", cascade={"persist"}), fetch="EAGER")
     * @ORM\JoinColumn(nullable=false)
     */
     private $etatJeu;

    /**
     * @var MouvementJeu
     *
     * @ORM\ManyToMany(targetEntity="MouvementJeu", mappedBy="jeux"), fetch="EAGER")
     * @ORM\JoinColumn(nullable=true)
     */
    private $mouvementJeu;

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
     * 
     * @param int $idPhysique
     */
    public function __construct()
    {
        $this->etatJeu = new ArrayCollection();
    }

    /**
     * Add etatJeu
     *
     * @param EtatJeu $etatJeu
     *
     * @return Jeu
     */
    public function addEtatJeu(EtatJeu $etatJeu)
    {
        $etatJeu->setJeu($this);
        $this->etatJeu->add($etatJeu);
        return $this;
    }

    /**
     * Remove etatJeu
     *
     * @param EtatJeu $etatJeu
     */
    public function removeEtatJeu(EtatJeu $etatJeu)
    {
        $this->etatJeu->removeElement($etatJeu);
    }

    /**
     * Get etatJeu
     *
     * @return \Doctrine\Common\Collections\Collection|EtatJeu[]
     */
    public function getEtatJeu()
    {
        return $this->etatJeu;
    }

    /**
     * Get last etatJeu
     *
     * @return EtatJeu
     */
    public function getLastEtatJeu()
    {
        $dateMax = null;
        $lastEtat = null;
        foreach ($this->etatJeu as $etat) {
            if ($dateMax == null) {
                $dateMax = $etat->getDate();
                $lastEtat = $etat;
                continue;
            }
            if ($dateMax < $etat->getDate()) {
                $dateMax = $etat->getDate();
                $lastEtat = $etat;
            }
        }
        return $lastEtat;
    }

    /**
     * @param \Dglas\JeuBundle\Entity\EtatJeu[]|ArrayCollection $etatJeu
     * @return Jeu
     */
    public function setEtatJeu($etatJeu)
    {
        $this->etatJeu = $etatJeu;
        return $this;
    }

    public function getNomJeuNomProprietaire()
    {
        return sprintf('%s %s - %s', str_pad($this->idPhysique, 3, '0', STR_PAD_LEFT), $this->getNommenclatureJeu()->getNom(), $this->getProprietaire()->getNom());
    }

    /**
     * @return String
     */
    public function getEtatString()
    {
        $lastEtat = $this->getLastEtatJeu();
        return $lastEtat->getEtatString();
    }

    /**
     * Set idPhysique
     *
     * @param integer $idPhysique
     *
     * @return Jeu
     */
    public function setIdPhysique($idPhysique)
    {
        $this->idPhysique = $idPhysique;

        return $this;
    }

    /**
     * Get idPhysique
     *
     * @return integer
     */
    public function getIdPhysique()
    {
        return $this->idPhysique;
    }
    

    /**
     * Add mouvementJeu
     *
     * @param \Dglas\JeuBundle\Entity\MouvementJeu $mouvementJeu
     *
     * @return Jeu
     */
    public function addMouvementJeu(\Dglas\JeuBundle\Entity\MouvementJeu $mouvementJeu)
    {
        $this->mouvementJeu[] = $mouvementJeu;

        return $this;
    }

    /**
     * Remove mouvementJeu
     *
     * @param \Dglas\JeuBundle\Entity\MouvementJeu $mouvementJeu
     */
    public function removeMouvementJeu(\Dglas\JeuBundle\Entity\MouvementJeu $mouvementJeu)
    {
        $this->mouvementJeu->removeElement($mouvementJeu);
    }

    /**
     * Get mouvementJeu
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMouvementJeu()
    {
        return $this->mouvementJeu;
    }
}
