<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 03/01/2018
 * Time: 11:15
 */

namespace Examen\ReclamationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Reclamation
 * @ORM\Entity
 */

class Reclamation
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string",length=255)
     */
    private $matricule;

    /**
     * @var string
     * @ORM\Column(name="nom", type="string", length=70, nullable=false)
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(name="prenom", type="string", length=70, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     * @ORM\Column(name="enseignant", type="string", length=70, nullable=false)
     */
    private $enseignant;

    /**
     * @var string
     * @ORM\Column(name="motif", type="string", length=255, nullable=false)
     */
    private $motif;

    /**
     * @var string
     * @ORM\Column(name="statut", type="string", length=55, nullable=false)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="Classe")
     */
    private $classe;

    /**
     * Reclamation constructor.
     */
    public function __construct()
    {
        $this->statut = "en cours";
    }

    /**
     * @return mixed
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @param mixed $matricule
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getEnseignant()
    {
        return $this->enseignant;
    }

    /**
     * @param string $enseignant
     */
    public function setEnseignant($enseignant)
    {
        $this->enseignant = $enseignant;
    }

    /**
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * @param string $motif
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    /**
     * @return mixed
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * @param mixed $classe
     */
    public function setClasse($classe)
    {
        $this->classe = $classe;
    }


}