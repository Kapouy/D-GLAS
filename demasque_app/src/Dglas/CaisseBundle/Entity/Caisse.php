<?php

namespace Dglas\CaisseBundle\Entity;

/**
 * Caisse
 */
class Caisse
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;


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
     * @return Caisse
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
     * @var \DateTime
     */
    private $dateCaisse;

    /**
     * @var array
     */
    private $benevole;

    /**
     * @var integer
     */
    private $fond10;

    /**
     * @var integer
     */
    private $fond5;

    /**
     * @var integer
     */
    private $fond2;

    /**
     * @var integer
     */
    private $fond1;

    /**
     * @var integer
     */
    private $fond05;

    /**
     * @var integer
     */
    private $fond02;

    /**
     * @var integer
     */
    private $fond01;

    /**
     * @var integer
     */
    private $caisse100;

    /**
     * @var integer
     */
    private $caisse50;

    /**
     * @var integer
     */
    private $caisse20;

    /**
     * @var integer
     */
    private $caisse10;

    /**
     * @var integer
     */
    private $caisse5;

    /**
     * @var integer
     */
    private $caisse2;

    /**
     * @var integer
     */
    private $caisse1;

    /**
     * @var integer
     */
    private $caisse05;

    /**
     * @var integer
     */
    private $caisse02;

    /**
     * @var integer
     */
    private $caisse01;

    /**
     * @var integer
     */
    private $caisse005;

    /**
     * @var integer
     */
    private $caisse002;

    /**
     * @var integer
     */
    private $caisse001;

    /**
     * @var float
     */
    private $caisseCB;

    /**
     * @var float
     */
    private $cheque;


    /**
     * Set dateCaisse
     *
     * @param \DateTime $dateCaisse
     *
     * @return Caisse
     */
    public function setDateCaisse($dateCaisse)
    {
        $this->dateCaisse = $dateCaisse;

        return $this;
    }

    /**
     * Get dateCaisse
     *
     * @return \DateTime
     */
    public function getDateCaisse()
    {
        return $this->dateCaisse;
    }

    /**
     * Set benevole
     *
     * @param array $benevole
     *
     * @return Caisse
     */
    public function setBenevole($benevole)
    {
        $this->benevole = $benevole;

        return $this;
    }

    /**
     * Get benevole
     *
     * @return array
     */
    public function getBenevole()
    {
        return $this->benevole;
    }

    /**
     * Set fond10
     *
     * @param integer $fond10
     *
     * @return Caisse
     */
    public function setFond10($fond10)
    {
        $this->fond10 = $fond10;

        return $this;
    }

    /**
     * Get fond10
     *
     * @return integer
     */
    public function getFond10()
    {
        return $this->fond10;
    }

    /**
     * Set fond5
     *
     * @param integer $fond5
     *
     * @return Caisse
     */
    public function setFond5($fond5)
    {
        $this->fond5 = $fond5;

        return $this;
    }

    /**
     * Get fond5
     *
     * @return integer
     */
    public function getFond5()
    {
        return $this->fond5;
    }

    /**
     * Set fond2
     *
     * @param integer $fond2
     *
     * @return Caisse
     */
    public function setFond2($fond2)
    {
        $this->fond2 = $fond2;

        return $this;
    }

    /**
     * Get fond2
     *
     * @return integer
     */
    public function getFond2()
    {
        return $this->fond2;
    }

    /**
     * Set fond1
     *
     * @param integer $fond1
     *
     * @return Caisse
     */
    public function setFond1($fond1)
    {
        $this->fond1 = $fond1;

        return $this;
    }

    /**
     * Get fond1
     *
     * @return integer
     */
    public function getFond1()
    {
        return $this->fond1;
    }

    /**
     * Set fond05
     *
     * @param integer $fond05
     *
     * @return Caisse
     */
    public function setFond05($fond05)
    {
        $this->fond05 = $fond05;

        return $this;
    }

    /**
     * Get fond05
     *
     * @return integer
     */
    public function getFond05()
    {
        return $this->fond05;
    }

    /**
     * Set fond02
     *
     * @param integer $fond02
     *
     * @return Caisse
     */
    public function setFond02($fond02)
    {
        $this->fond02 = $fond02;

        return $this;
    }

    /**
     * Get fond02
     *
     * @return integer
     */
    public function getFond02()
    {
        return $this->fond02;
    }

    /**
     * Set fond01
     *
     * @param integer $fond01
     *
     * @return Caisse
     */
    public function setFond01($fond01)
    {
        $this->fond01 = $fond01;

        return $this;
    }

    /**
     * Get fond01
     *
     * @return integer
     */
    public function getFond01()
    {
        return $this->fond01;
    }

    /**
     * Set caisse100
     *
     * @param integer $caisse100
     *
     * @return Caisse
     */
    public function setCaisse100($caisse100)
    {
        $this->caisse100 = $caisse100;

        return $this;
    }

    /**
     * Get caisse100
     *
     * @return integer
     */
    public function getCaisse100()
    {
        return $this->caisse100;
    }

    /**
     * Set caisse50
     *
     * @param integer $caisse50
     *
     * @return Caisse
     */
    public function setCaisse50($caisse50)
    {
        $this->caisse50 = $caisse50;

        return $this;
    }

    /**
     * Get caisse50
     *
     * @return integer
     */
    public function getCaisse50()
    {
        return $this->caisse50;
    }

    /**
     * Set caisse20
     *
     * @param integer $caisse20
     *
     * @return Caisse
     */
    public function setCaisse20($caisse20)
    {
        $this->caisse20 = $caisse20;

        return $this;
    }

    /**
     * Get caisse20
     *
     * @return integer
     */
    public function getCaisse20()
    {
        return $this->caisse20;
    }

    /**
     * Set caisse10
     *
     * @param integer $caisse10
     *
     * @return Caisse
     */
    public function setCaisse10($caisse10)
    {
        $this->caisse10 = $caisse10;

        return $this;
    }

    /**
     * Get caisse10
     *
     * @return integer
     */
    public function getCaisse10()
    {
        return $this->caisse10;
    }

    /**
     * Set caisse5
     *
     * @param integer $caisse5
     *
     * @return Caisse
     */
    public function setCaisse5($caisse5)
    {
        $this->caisse5 = $caisse5;

        return $this;
    }

    /**
     * Get caisse5
     *
     * @return integer
     */
    public function getCaisse5()
    {
        return $this->caisse5;
    }

    /**
     * Set caisse2
     *
     * @param integer $caisse2
     *
     * @return Caisse
     */
    public function setCaisse2($caisse2)
    {
        $this->caisse2 = $caisse2;

        return $this;
    }

    /**
     * Get caisse2
     *
     * @return integer
     */
    public function getCaisse2()
    {
        return $this->caisse2;
    }

    /**
     * Set caisse1
     *
     * @param integer $caisse1
     *
     * @return Caisse
     */
    public function setCaisse1($caisse1)
    {
        $this->caisse1 = $caisse1;

        return $this;
    }

    /**
     * Get caisse1
     *
     * @return integer
     */
    public function getCaisse1()
    {
        return $this->caisse1;
    }

    /**
     * Set caisse05
     *
     * @param integer $caisse05
     *
     * @return Caisse
     */
    public function setCaisse05($caisse05)
    {
        $this->caisse05 = $caisse05;

        return $this;
    }

    /**
     * Get caisse05
     *
     * @return integer
     */
    public function getCaisse05()
    {
        return $this->caisse05;
    }

    /**
     * Set caisse02
     *
     * @param integer $caisse02
     *
     * @return Caisse
     */
    public function setCaisse02($caisse02)
    {
        $this->caisse02 = $caisse02;

        return $this;
    }

    /**
     * Get caisse02
     *
     * @return integer
     */
    public function getCaisse02()
    {
        return $this->caisse02;
    }

    /**
     * Set caisse01
     *
     * @param integer $caisse01
     *
     * @return Caisse
     */
    public function setCaisse01($caisse01)
    {
        $this->caisse01 = $caisse01;

        return $this;
    }

    /**
     * Get caisse01
     *
     * @return integer
     */
    public function getCaisse01()
    {
        return $this->caisse01;
    }

    /**
     * Set caisse005
     *
     * @param integer $caisse005
     *
     * @return Caisse
     */
    public function setCaisse005($caisse005)
    {
        $this->caisse005 = $caisse005;

        return $this;
    }

    /**
     * Get caisse005
     *
     * @return integer
     */
    public function getCaisse005()
    {
        return $this->caisse005;
    }

    /**
     * Set caisse002
     *
     * @param integer $caisse002
     *
     * @return Caisse
     */
    public function setCaisse002($caisse002)
    {
        $this->caisse002 = $caisse002;

        return $this;
    }

    /**
     * Get caisse002
     *
     * @return integer
     */
    public function getCaisse002()
    {
        return $this->caisse002;
    }

    /**
     * Set caisse001
     *
     * @param integer $caisse001
     *
     * @return Caisse
     */
    public function setCaisse001($caisse001)
    {
        $this->caisse001 = $caisse001;

        return $this;
    }

    /**
     * Get caisse001
     *
     * @return integer
     */
    public function getCaisse001()
    {
        return $this->caisse001;
    }

    /**
     * Set caisseCB
     *
     * @param float $caisseCB
     *
     * @return Caisse
     */
    public function setCaisseCB($caisseCB)
    {
        $this->caisseCB = $caisseCB;

        return $this;
    }

    /**
     * Get caisseCB
     *
     * @return float
     */
    public function getCaisseCB()
    {
        return $this->caisseCB;
    }

    /**
     * Set cheque
     *
     * @param float $cheque
     *
     * @return Caisse
     */
    public function setCheque($cheque)
    {
        $this->cheque = $cheque;

        return $this;
    }

    /**
     * Get cheque
     *
     * @return float
     */
    public function getCheque()
    {
        return $this->cheque;
    }
}
