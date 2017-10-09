<?php

namespace Dglas\CaisseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DglasCaisseBundle:Default:index.html.twig');
    }
}
