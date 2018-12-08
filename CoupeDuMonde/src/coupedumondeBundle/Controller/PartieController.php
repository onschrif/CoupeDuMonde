<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 24/12/2017
 * Time: 19:16
 */

namespace coupedumondeBundle\Controller;


use coupedumondeBundle\Entity\Partie;
use coupedumondeBundle\Form\PartieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PartieController extends Controller
{
    public function ajoutAction(Request $request)
    {
        $Partie = new Partie();
        $form = $this->createForm(PartieType::class,$Partie);
        $form->handleRequest($request);
        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            if($form['Equipe1']->getData() != $form['Equipe2']->getData() )
            {
               // $equipe1= $em->getRepository("coupedumondeBundle:Equipe")->findOneBy(array("Pays" =>$form['Equipe1']->getData()));
                $Partie->setEquipe1($form['Equipe1']->getData());
               // $equipe2= $em->getRepository("coupedumondeBundle:Equipe")->findOneBy(array("Pays" =>$form['Equipe2']->getData()));
                $Partie->setEquipe2($form['Equipe2']->getData());
                $em->persist($Partie);
                $em->flush();
            }
        }
        return $this->render("coupedumondeBundle:partie:ajoutpartie.html.twig",array('form'=>$form->createView()));
    }

    public function afficherAction()
    {

        $em = $this->getDoctrine()->getManager();
        $parties = $em->getRepository("coupedumondeBundle:Partie")->findAll();

        return $this->render("coupedumondeBundle:partie:affichage.html.twig",array('parties'=>$parties));
    }

    public function rechercherAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $Quest = $em->getRepository("coupedumondeBundle:Partie")->findAll();
        $equipes = $em->getRepository("coupedumondeBundle:Equipe")->findAll();

        if($request ->isMethod("POST"))
        {

            $equpe = $request->get('equipe');
            $date = $request->get('date');


            if ($equpe != "Selectionner une équipe")
            {
                $y = $em->getRepository("coupedumondeBundle:Equipe")->findOneBy(array("Pays" =>$equpe));
                if($date == "")
                {

                    $questions = $em->createQuery('SELECT p FROM coupedumondeBundle:Partie p WHERE p.Equipe1 =:k OR p.Equipe2 =:k');
                    $questions->setParameter('k', $y);
                    $Quest = $questions->getResult();
                }

                else
                {
                    $questions = $em->createQuery('SELECT p FROM coupedumondeBundle:Partie p WHERE p.Equipe1 =:k OR p.Equipe2 =:k HAVING p.DateMatch =:z');
                    $questions->setParameter('k', $y);
                    $questions->setParameter('z', $date);
                    $Quest = $questions->getResult();
                }


            }

            elseif ($equpe == "Selectionner une équipe" && $date !="")
            {
                $questions = $em->createQuery('SELECT p FROM coupedumondeBundle:Partie p WHERE p.DateMatch =:k');
                $questions->setParameter('k', $date);
                $Quest = $questions->getResult();
            }


        }

        return $this->render("coupedumondeBundle:partie:recherchepartie.html.twig", array('parties' => $Quest,'equipes'=>$equipes));

    }
}