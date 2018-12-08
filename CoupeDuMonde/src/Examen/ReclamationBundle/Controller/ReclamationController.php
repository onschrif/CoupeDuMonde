<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 03/01/2018
 * Time: 11:15
 */

namespace Examen\ReclamationBundle\Controller;



use Examen\ReclamationBundle\Entity\Reclamation;
use Examen\ReclamationBundle\Form\ReclamationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReclamationController extends Controller
{
    public function ajoutAction(Request $request)
    {
        $Reclamation = new Reclamation();
        $form = $this->createForm(ReclamationType::class,$Reclamation);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($Reclamation);
            $em->flush();

        }
        return $this->render("ExamenReclamationBundle:reclamation:ajout.html.twig",array('form'=>$form->createView()));
    }

    public function AffichageAction()
    {
        $em = $this->getDoctrine()->getManager();
        $Reclamations = $em->getRepository("ExamenReclamationBundle:Reclamation")->findAll();
        return $this->render("ExamenReclamationBundle:reclamation:affichage.html.twig",array('Reclamations'=>$Reclamations));
    }

    public function TraiterAction( $id)
    {
        $em = $this->getDoctrine()->getManager();
        $Reclamation = $em->getRepository("ExamenReclamationBundle:Reclamation")->find($id);
        $Reclamation->setStatut("traité");
        $em->persist($Reclamation);
        $em->flush();
        return $this->redirectToRoute("AffichageReclamation");
    }

    public function rechercherAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $Reclamations = $em->getRepository("ExamenReclamationBundle:Reclamation")->findAll();

        if($request ->isMethod("POST"))
        {
            $enseignant = $request->get('enseignant');
            $statut = $request->get('statut');
            $em = $this->getDoctrine()->getManager();
            if($enseignant == "" && $statut != "" )
            {

                $questions = $em->createQuery('SELECT p FROM ExamenReclamationBundle:Reclamation p WHERE p.statut =:k');
                $questions->setParameter('k', $statut);
                $Reclamations = $questions->getResult();
            }
           elseif ($enseignant != "" && $statut == "" )
            {

                $questions = $em->createQuery('SELECT p FROM ExamenReclamationBundle:Reclamation p WHERE p.enseignant =:k');
                $questions->setParameter('k', $enseignant);
                $Reclamations = $questions->getResult();

            }

            elseif ($enseignant != "" && $statut != "" )
            {
                $questions = $em->createQuery('SELECT p FROM ExamenReclamationBundle:Reclamation p WHERE p.enseignant =:k AND p.statut =:z');
                $questions->setParameter('k', $enseignant);
                $questions->setParameter('z', $statut);
                $Reclamations = $questions->getResult();

            }



        }

        return $this->render("ExamenReclamationBundle:reclamation:recherche.html.twig", array('Reclamations' => $Reclamations));

    }
}