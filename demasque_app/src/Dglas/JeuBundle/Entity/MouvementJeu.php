<?php

namespace Dglas\JeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MouvementJeu
 *
 * @ORM\Table(name="mouvement_jeu")
 * @ORM\Entity(repositoryClass="Dglas\JeuBundle\Repository\MouvementJeuRepository")
 */
class MouvementJeu
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
     * @ORM\Column(name="dateMouvement", type="datetime")
     */
    private $dateMouvement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRetourPrevu", type="datetime", nullable=true)
     */
    private $dateRetourPrevu;

    /**
     * @var \GestionnaireJeu
     *
     * @ORM\ManyToOne(targetEntity="GestionnaireJeu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gestionnaireJeu;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Jeu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jeux;

    /**
     * @var \Lieu
     *
     * @ORM\ManyToOne(targetEntity="Lieu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $destination;

    /**
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=500, nullable=true)
     */
    private $commentaire;

    /**
     * @var EtatJeu
     *
     * @ORM\OneToMany(targetEntity="EtatJeu", mappedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etatJeux;


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
     * Set dateMouvement
     *
     * @param \DateTime $dateMouvement
     *
     * @return MouvementJeu
     */
    public function setDateMouvement($dateMouvement)
    {
        $this->dateMouvement = $dateMouvement;

        return $this;
    }

    /**
     * Get dateMouvement
     *
     * @return \DateTime
     */
    public function getDateMouvement()
    {
        return $this->dateMouvement;
    }

    /**
     * Set dateRetourPrevu
     *
     * @param \DateTime $dateRetourPrevu
     *
     * @return MouvementJeu
     */
    public function setDateRetourPrevu($dateRetourPrevu)
    {
        $this->dateRetourPrevu = $dateRetourPrevu;

        return $this;
    }

    /**
     * Get dateRetourPrevu
     *
     * @return \DateTime
     */
    public function getDateRetourPrevu()
    {
        return $this->dateRetourPrevu;
    }

    /**
     * Set gestionnaireJeu
     *
     * @param \stdClass $gestionnaireJeu
     *
     * @return MouvementJeu
     */
    public function setGestionnaireJeu($gestionnaireJeu)
    {
        $this->gestionnaireJeu = $gestionnaireJeu;

        return $this;
    }

    /**
     * Get gestionnaireJeu
     *
     * @return \stdClass
     */
    public function getGestionnaireJeu()
    {
        return $this->gestionnaireJeu;
    }

    /**
     * Set jeux
     *
     * @param array $jeux
     *
     * @return MouvementJeu
     */
    public function setJeux($jeux)
    {
        $this->jeux = $jeux;

        return $this;
    }

    /**
     * Get jeux
     *
     * @return array
     */
    public function getJeux()
    {
        return $this->jeux;
    }

    /**
     * Set destination
     *
     * @param \stdClass $destination
     *
     * @return MouvementJeu
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return \stdClass
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return MouvementJeu
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
     * Set etatJeux
     *
     * @param array $etatJeux
     *
     * @return MouvementJeu
     */
    public function setEtatJeux($etatJeux)
    {
        $this->etatJeux = $etatJeux;

        return $this;
    }

    /**
     * Get etatJeux
     *
     * @return array
     */
    public function getEtatJeux()
    {
        return $this->etatJeux;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jeux = new \Doctrine\Common\Collections\ArrayCollection();
        $this->etatJeux = new \Doctrine\Common\Collections\ArrayCollection();
         $this->dateMouvement = new  \DateTime();
$this->dateRetourPrevu = new  \DateTime();
    }

    /**
     * Add jeux
     *
     * @param \Dglas\JeuBundle\Entity\Jeu $jeux
     *
     * @return MouvementJeu
     */
    public function addJeux(\Dglas\JeuBundle\Entity\Jeu $jeux)
    {
        $this->jeux[] = $jeux;

        return $this;
    }

    /**
     * Remove jeux
     *
     * @param \Dglas\JeuBundle\Entity\Jeu $jeux
     */
    public function removeJeux(\Dglas\JeuBundle\Entity\Jeu $jeux)
    {
        $this->jeux->removeElement($jeux);
    }

    /**
     * Add etatJeux
     *
     * @param \Dglas\JeuBundle\Entity\EtatJeu $etatJeux
     *
     * @return MouvementJeu
     */
    public function addEtatJeux(\Dglas\JeuBundle\Entity\EtatJeu $etatJeux)
    {
        $this->etatJeux[] = $etatJeux;

        return $this;
    }

    /**
     * Remove etatJeux
     *
     * @param \Dglas\JeuBundle\Entity\EtatJeu $etatJeux
     */
    public function removeEtatJeux(\Dglas\JeuBundle\Entity\EtatJeu $etatJeux)
    {
        $this->etatJeux->removeElement($etatJeux);
    }

    public function getStringInfoMouvement()
    {
        return sprintf('Le %s vers %s par %s', $this->getDateMouvement()->format('Y-M-d'), $this->getDestination()->getNom(), $this->getGestionnaireJeu()->getNom());
    }
}
