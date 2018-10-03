<?php

namespace Dglas\JeuRestBundle\Controller;

use FOS\RestBundle\Routing\ClassResourceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class JeuController extends Controller implements ClassResourceInterface
{
    /**
     * @return array|\Dglas\JeuBundle\Entity\Jeu[]
     */
    public function cgetAction(Request $request) 
    {
        $repository = $this->getDoctrine()->getRepository('DglasJeuBundle:Jeu'); 

	//return $repository->createQuery('SELECT j.nommenclatureJeu FROM DglasJeuBundle:Jeu j')->getResult();

        //return $this->getDoctrine()->getRepository('DglasJeuBundle:Jeu')->findAll();
	return $this->getDoctrine()->getRepository('DglasJeuBundle:Jeu')->test();
	//return "bonjour";

    }

    public function getAction($id)
    {	
        $object = $this->getDoctrine()->getRepository('DglasJeuBundle:Jeu')->findOneBy(['idPhysique' => $id]);

        //$this->denyAccessUnlessGranted('VIEW', $object);

	//var_dump($object);

        //return $object->getNommenclatureJeu()->getNom();
        return $object->getNommenclatureJeu();

    }
}
