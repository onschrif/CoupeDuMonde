<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 24/12/2017
 * Time: 17:24
 */

namespace coupedumondeBundle\Controller;


use coupedumondeBundle\Entity\Equipe;
use coupedumondeBundle\Form\EquipeType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EquipeController extends Controller
{
    public function ajoutAction(Request $request)
    {
        $Equipe = new Equipe();
        $form = $this->createForm(EquipeType::class,$Equipe);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();

                $em->persist($Equipe);
                $em->flush();

        }
        return $this->render("coupedumondeBundle:equipe:ajoutequipe.html.twig",array('form'=>$form->createView()));
    }

    public function afficheAction()
    {
        $em = $this->getDoctrine()->getManager();
        $equipes = $em->getRepository("coupedumondeBundle:Equipe")->findAll();

        return $this->render("coupedumondeBundle:equipe:affichage.html.twig",array('equipes'=>$equipes));
    }

}