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
     * @var Jeu
     *
     * @ORM\ManyToOne(targetEntity="Jeu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jeu;

    /**
     * @var NommenclatureJeu
     *
     * @ORM\ManyToOne(targetEntity="Jeu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $nommenclatureJeu;

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
     * @param NommenclatureEtat $nommenclatureEtat
     *
     * @return EtatJeu
     */
    public function setNommenclatureEtat(NommenclatureEtat $nommenclatureEtat)
    {
        $this->nommenclatureEtat = $nommenclatureEtat;
        return $this;
    }

    /**
     * Get nommenclatureEtat
     *
     * @return NommenclatureEtat
     */
    public function getNommenclatureEtat()
    {
        return $this->nommenclatureEtat;
    }
}

