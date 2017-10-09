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

        return $this->getDoctrine()->getRepository('DglasJeuBundle:Jeu')->findAll();
    }

    public function getAction($id)
    {
        $object = $this->getDoctrine()->getRepository('DglasJeuBundle:Jeu')->findOneBy(['idPhysique' => $id]);

        //$this->denyAccessUnlessGranted('VIEW', $object);

        return $object;
    }
}
