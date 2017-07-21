<?php

namespace Dglas\JeuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DglasJeuBundle:Default:index.html.twig');
    }
}
