<?php

namespace Examen\ReclamationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ExamenReclamationBundle:Default:index.html.twig');
    }
}
