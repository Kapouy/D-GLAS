<?php

namespace Dglas\JeuBundle\Repository;

/**
 * NommenclatureEtatRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NommenclatureEtatRepository extends \Doctrine\ORM\EntityRepository
{

public function getChoices()
	{
		$raw = $this->_em->createQuery('
			SELECT c.id, c.nom
			FROM DglasJeuBundle:NommenclatureEtat c
			ORDER BY c.id ASC
		')->getResult();
		$etat = array();
		foreach ($raw as $r) {
			$key          = $r['id'];
			$etat[$key] = $r['nom'] ;
		}
		return $etat;
	}
}