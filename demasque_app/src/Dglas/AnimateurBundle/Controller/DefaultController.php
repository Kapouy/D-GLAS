<?php

namespace Dglas\AnimateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DglasAnimateurBundle:Default:index.html.twig');
    }
}
