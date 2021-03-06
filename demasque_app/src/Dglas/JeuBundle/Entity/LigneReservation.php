<?php

namespace Dglas\JeuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LigneReservation
 *
 * @ORM\Table(name="ligne_reservation")
 * @ORM\Entity(repositoryClass="Dglas\JeuBundle\Repository\LigneReservationRepository")
 */
class LigneReservation
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
     * @var Reservation
     *
     * @ORM\ManyToOne(targetEntity="Reservation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reservation;

     /**
     * @var Jeu
     *
     * @ORM\ManyToOne(targetEntity="Jeu")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jeu;


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
     * Set reservation
     *
     * @param \Dglas\JeuBundle\Entity\Reservation $reservation
     *
     * @return LigneReservation
     */
    public function setReservation(\Dglas\JeuBundle\Entity\Reservation $reservation)
    {
        $this->reservation = $reservation;

        return $this;
    }

    /**
     * Get reservation
     *
     * @return \Dglas\JeuBundle\Entity\Reservation
     */
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * Set jeu
     *
     * @param \Dglas\JeuBundle\Entity\Jeu $jeu
     *
     * @return LigneReservation
     */
    public function setJeu(\Dglas\JeuBundle\Entity\Jeu $jeu)
    {
        $this->jeu = $jeu;

        return $this;
    }

    /**
     * Get jeu
     *
     * @return \Dglas\JeuBundle\Entity\Jeu
     */
    public function getJeu()
    {
        return $this->jeu;
    }
}
