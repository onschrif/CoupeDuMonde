<?php

namespace coupedumondeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('coupedumondeBundle:Default:index.html.twig');
    }
}
