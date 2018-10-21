<?php

namespace Dglas\JeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtatJeu
 *
 * @ORM\Table(name="etat_jeu")
 * @ORM\Entity(repositoryClass="Dglas\JeuBundle\Repository\EtatJeuRepository")
 */
class EtatJeu
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255, nullable=true)
     */
    private $commentaire;

    /**
     * @var bool
     *
     * @ORM\Column(name="jouable", type="boolean")
     */
    private $jouable;

    /**
     * @var bool
     *
     * @ORM\Column(name="piecesManquantes", type="boolean")
     */
    private $piecesManquantes;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="flagInventaire", type="boolean")
     */
    private $flagInventaire = false;

    /**
     * @var Jeu
     *
     * @ORM\ManyToOne(targetEntity="Jeu", inversedBy="etatJeu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jeu;

        /**
     * @var NommenclatureEtat
     *
     * @ORM\ManyToOne(targetEntity="NommenclatureEtat")
     * @ORM\JoinColumn(nullable=false)
     */
     private $nommenclatureEtat;

     
        /**
     * @var Inventaire
     *
     * @ORM\ManyToOne(targetEntity="Inventaire")
     * @ORM\JoinColumn(nullable=true)
     */
    private $inventaire;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return EtatJeu
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return EtatJeu
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set jouable
     *
     * @param boolean $jouable
     *
     * @return EtatJeu
     */
    public function setJouable($jouable)
    {
        $this->jouable = $jouable;

        return $this;
    }

    /**
     * Get jouable
     *
     * @return bool
     */
    public function getJouable()
    {
        return $this->jouable;
    }

    /**
     * Set piecesManquantes
     *
     * @param boolean $piecesManquantes
     *
     * @return EtatJeu
     */
    public function setPiecesManquantes($piecesManquantes)
    {
        $this->piecesManquantes = $piecesManquantes;

        return $this;
    }

    /**
     * Get piecesManquantes
     *
     * @return bool
     */
    public function getPiecesManquantes()
    {
        return $this->piecesManquantes;
    }

    /**
     * Set Jeu
     *
     * @param Jeu $jeu
     *
     * @return EtatJeu
     */
    public function setJeu(Jeu $jeu)
    {
        $this->jeu = $jeu;
        return $this;
    }

    /**
     * Get Jeu
     *
     * @return Jeu
     */
    public function getJeu()
    {
        return $this->jeu;
    }

    /**
     * Set nommenclatureEtat
     *
     * @param \Dglas\JeuBundle\Entity\NommenclatureEtat $nommenclatureEtat
     *
     * @return EtatJeu
     */
    public function setNommenclatureEtat(\Dglas\JeuBundle\Entity\NommenclatureEtat $nommenclatureEtat)
    {
        $this->nommenclatureEtat = $nommenclatureEtat;

        return $this;
    }

    /**
     * Get nommenclatureEtat
     *
     * @return \Dglas\JeuBundle\Entity\NommenclatureEtat
     */
    public function getNommenclatureEtat()
    {
        return $this->nommenclatureEtat;
    }
	
    public function getNom()
    {
        return $this->getNommenclatureEtat()->getNom();
    }
	
    public function getStringDateEtat()
    {
        return sprintf('%s  %s', $this->getDate()->format('Y-M-d'), $this->getNommenclatureEtat()->getNom());
    }

    public function getStringEtatJouable()
    {
        return sprintf('%s jouable - %s', $this->getJouable() ? '' : 'non ', $this->getNommenclatureEtat()->getNom());
    }

    public function getStringDateEtatJouable()
    {
        return sprintf('%s  %s jouable - %s', $this->getDate()->format('Y-M-d'), $this->getJouable() ? '' : 'non ', $this->getNommenclatureEtat()->getNom());
    }

    public function getDetail()
    {
        return sprintf('%s %s - %s - %s - %s', 
            $this->getDate()->format('d/m/Y'), 
            $this->getJouable() ? 'jouable' : 'non jouable', 
            $this->getNommenclatureEtat()->getNom(),
            $this->getPiecesManquantes() ? 'non complet' : 'complet',
            $this->getCommentaire()
        );
    }

    public function getStringInventaire()
    {
        if ($this->getFlagInventaire()) {
            return sprintf('Inventaire à valider ----- %s' , $this->getJeu()->getNomJeuNomProprietaire()); 
        }
        return sprintf('--------------------------------%s', $this->getJeu()->getNomJeuNomProprietaire());
    }

        /**
     * @return String
     */
    public function getEtatString()
    {
        if ($this->getFlagInventaire()) {
            return sprintf('Inventaire à valider'); 
        }
        return sprintf('%s', $this->getStringEtatJouable());
    }

    
        /**
     * @return String
     */
    public function getDateEtatString()
    {
        if ($this->getFlagInventaire()) {
            return sprintf('Inventaire à valider'); 
        }
        return sprintf('%s', $this->getStringDateEtatJouable());
    }

    /**
     * Set flagInventaire
     *
     * @param boolean $flagInventaire
     *
     * @return EtatJeu
     */
    public function setFlagInventaire($flagInventaire)
    {
        $this->flagInventaire = $flagInventaire;

        return $this;
    }

    /**
     * Get flagInventaire
     *
     * @return boolean
     */
    public function getFlagInventaire()
    {
        return $this->flagInventaire;
    }

    /**
     * Set inventaire
     *
     * @param \Dglas\JeuBundle\Entity\Inventaire $inventaire
     *
     * @return EtatJeu
     */
    public function setInventaire(\Dglas\JeuBundle\Entity\Inventaire $inventaire)
    {
        $this->inventaire = $inventaire;

        return $this;
    }

    /**
     * Get inventaire
     *
     * @return \Dglas\JeuBundle\Entity\Inventaire
     */
    public function getInventaire()
    {
        return $this->inventaire;
    }
}
