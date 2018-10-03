<?php

namespace Dglas\JeuBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Dglas\JeuBundle\Entity\MouvementJeu;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MouvementJeuAdminController extends CRUDController
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
		$clonedObject->setDateRetourPrevu(null)->setGestionnaireJeu($object->getGestionnaireJeu())
		->setJeux($object->getJeux());
		
		$dest = $em->getRepository('DglasJeuBundle:Lieu')->find(1);
		$clonedObject->setDestination($dest);

        $this->admin->create($clonedObject);

        //$this->addFlash('sonata_flash_success', 'Cloned successfully');

        return new RedirectResponse($this->admin->generateUrl('edit', array('id' => $clonedObject->getId())));
		
		//$form = $this->createForm('Dglas\JeuBundle\Form\MouvementJeuType', $clonedObject);
		
		//return $this->render('mouvementJeu/new.html.twig', array(
        //    'mouvementJeu' => $clonedObject,
        //    'form' => $form->createView(),
        //));
    }
}
