<?php

namespace Dglas\JeuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dglas\JeuBundle\Entity\MouvementJeu;

class MouvementJeuAdminController extends Controller
{
	
	/**
     * @param $id
     */
    public function retourAction($id)
    {
		$em = $this->getDoctrine()->getManager();

        $object = $em->getRepository('DglasJeuBundle:MouvementJeu')->find($id);
		
        if (!$object) {
            throw new NotFoundHttpException(sprintf('Impossible de recuperer le mouvement : %s', $id));
        }

        $clonedObject = new MouvementJeu();
        $clonedObject->setCommentaire('Retour '.$object->getCommentaire());
		$clonedObject->setDateMouvement(new \DateTime());
		$clonedObject->setDateRetourPrevu(null)
		->setJeux($object->getJeux());

        //$this->admin->create($clonedObject);

        //$this->addFlash('sonata_flash_success', 'Cloned successfully');

        //return new RedirectResponse($this->admin->generateUrl('list'));
		
		$form = $this->createForm('Dglas\JeuBundle\Form\MouvementJeuType', $clonedObject);
		
		return $this->render('mouvementJeu/new.html.twig', array(
            'mouvementJeu' => $clonedObject,
            'form' => $form->createView(),
        ));
    }
	
}
