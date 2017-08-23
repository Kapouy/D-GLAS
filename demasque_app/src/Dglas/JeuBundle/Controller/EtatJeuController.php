<?php

namespace Dglas\JeuBundle\Controller;

use Dglas\JeuBundle\Entity\EtatJeu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Etatjeu controller.
 *
 */
class EtatJeuController extends Controller
{
    /**
     * Lists all etatJeu entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etatJeus = $em->getRepository('DglasJeuBundle:EtatJeu')->findAll();

        return $this->render('etatjeu/index.html.twig', array(
            'etatJeus' => $etatJeus,
        ));
    }

    /**
     * Finds and displays a etatJeu entity.
     *
     */
    public function showAction(EtatJeu $etatJeu)
    {

        return $this->render('etatjeu/show.html.twig', array(
            'etatJeu' => $etatJeu,
        ));
    }
}
