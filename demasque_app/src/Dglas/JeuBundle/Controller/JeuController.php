<?php

namespace Dglas\JeuBundle\Controller;

use Dglas\JeuBundle\Entity\Jeu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Jeu controller.
 *
 */
class JeuController extends Controller
{
    /**
     * Lists all jeu entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jeus = $em->getRepository('DglasJeuBundle:Jeu')->findAll();

        return $this->render('jeu/index.html.twig', array(
            'jeus' => $jeus,
        ));
    }

    /**
     * Creates a new jeu entity.
     *
     */
    public function newAction(Request $request)
    {
        $jeu = new Jeu();
        $form = $this->createForm('Dglas\JeuBundle\Form\JeuType', $jeu);
        $form->handleRequest($request);
        // $form->bind($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            foreach ($jeu->getEtatJeu() as $etat) {
               $etat->setJeu($jeu);
            }
    
                $em->persist($jeu);
                $em->flush();

            return $this->redirectToRoute('jeu_show', array('id' => $jeu->getId()));
        }

        return $this->render('jeu/new.html.twig', array(
            'jeu' => $jeu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a jeu entity.
     *
     */
    public function showAction(Jeu $jeu)
    {
        $deleteForm = $this->createDeleteForm($jeu);

        return $this->render('jeu/show.html.twig', array(
            'jeu' => $jeu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing jeu entity.
     *
     */
    public function editAction(Request $request, Jeu $jeu)
    {
        $deleteForm = $this->createDeleteForm($jeu);
        $editForm = $this->createForm('Dglas\JeuBundle\Form\JeuType', $jeu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            foreach ($jeu->getEtatJeu() as $etat) {
                $etat->setProduct($jeu);
            }

            return $this->redirectToRoute('jeu_edit', array('id' => $jeu->getId()));
        }

        return $this->render('jeu/edit.html.twig', array(
            'jeu' => $jeu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a jeu entity.
     *
     */
    public function deleteAction(Request $request, Jeu $jeu)
    {
        $form = $this->createDeleteForm($jeu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jeu);
            $em->flush();
        }

        return $this->redirectToRoute('jeu_index');
    }

    /**
     * Creates a form to delete a jeu entity.
     *
     * @param Jeu $jeu The jeu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Jeu $jeu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jeu_delete', array('id' => $jeu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
