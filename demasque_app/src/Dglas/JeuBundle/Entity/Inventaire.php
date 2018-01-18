<?php

namespace Dglas\JeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Dglas\JeuBundle\Entity\EtatJeu;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Inventaire
 *
 * @ORM\Table(name="inventaire")
 * @ORM\Entity(repositoryClass="Dglas\JeuBundle\Repository\InventaireRepository")
 */
class Inventaire
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
     * @ORM\Column(name="date", type="date", unique=true)
     */
    private $date;

    /**
     * @var EtatJeu
     *
     * @ORM\OneToMany(targetEntity="EtatJeu", mappedBy="inventaire"))
     * @ORM\JoinColumn(nullable=true)
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Inventaire
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
     * @return Inventaire
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

    /**
     * Get etatJeu
     *
     * @return \Doctrine\Common\Collections\Collection|EtatJeu[]
     */
    public function getEtatJeuValider()
    {

        $avalider = $this->etatJeu->filter(function ($value, $key) {
            return true;
        });

        return $avalider->all();

        $listRetour = new \Doctrine\Common\Collections\ArrayCollection();
        foreach ($this->etatJeu as $etat) {
            if ($etat->getFlagInventaire()) {
                $listRetour[] = $etat;
            }
        }
        return $listRetour;



    }
}
