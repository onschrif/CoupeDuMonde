<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 03/01/2018
 * Time: 11:30
 */

namespace Examen\ReclamationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Classe
 * @ORM\Entity
 */
class Classe
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="libelle", type="string", length=70, nullable=false)
     */
    private $libelle;

    /**
     * Classe constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }


}