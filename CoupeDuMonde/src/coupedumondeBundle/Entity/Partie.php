<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 24/12/2017
 * Time: 18:48
 */

namespace coupedumondeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Partie
 * @ORM\Entity
 */

class Partie
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="DateMatch", type="string", length=255, nullable=false)
     */
    private $DateMatch;

    /**
     * @var string
     * @ORM\Column(name="Heure", type="string", length=255, nullable=false)
     */
    private $Heure;

    /**
     * @var string
     * @ORM\Column(name="Lieu", type="string", length=255, nullable=false)
     */
    private $Lieu;

    /**
     * @ORM\ManyToOne(targetEntity="Equipe")
     */
    private $Equipe1;

    /**
     * @ORM\ManyToOne(targetEntity="Equipe")
     */
    private $Equipe2;

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
    public function getDateMatch()
    {
        return $this->DateMatch;
    }

    /**
     * @param string $DateMatch
     */
    public function setDateMatch($DateMatch)
    {
        $this->DateMatch = $DateMatch;
    }

    /**
     * @return string
     */
    public function getHeure()
    {
        return $this->Heure;
    }

    /**
     * @param string $Heure
     */
    public function setHeure($Heure)
    {
        $this->Heure = $Heure;
    }

    /**
     * @return string
     */
    public function getLieu()
    {
        return $this->Lieu;
    }

    /**
     * @param string $Lieu
     */
    public function setLieu($Lieu)
    {
        $this->Lieu = $Lieu;
    }

    /**
     * @return mixed
     */
    public function getEquipe1()
    {
        return $this->Equipe1;
    }

    /**
     * @param mixed $Equipe1
     */
    public function setEquipe1($Equipe1)
    {
        $this->Equipe1 = $Equipe1;
    }

    /**
     * @return mixed
     */
    public function getEquipe2()
    {
        return $this->Equipe2;
    }

    /**
     * @param mixed $Equipe2
     */
    public function setEquipe2($Equipe2)
    {
        $this->Equipe2 = $Equipe2;
    }


}