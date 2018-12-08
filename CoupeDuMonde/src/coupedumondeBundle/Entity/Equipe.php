<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 24/12/2017
 * Time: 15:58
 */

namespace coupedumondeBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Equipe
 * @ORM\Entity
 */


class Equipe
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="pays", type="string", length=255, nullable=false)
     */
    private $Pays;

    /**
     * @var string
     * @ORM\Column(name="capitaine", type="string", length=255, nullable=false)
     */
    private $Capitaine;

    /**
     * @var string
     * @ORM\Column(name="continent", type="string", length=255, nullable=false)
     */
    private $Continent;

    /**
     * @var string
     * @ORM\Column(name="coach", type="string", length=255, nullable=false)
     */
    private $Coach;

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
    public function getPays()
    {
        return $this->Pays;
    }

    /**
     * @param string $Pays
     */
    public function setPays($Pays)
    {
        $this->Pays = $Pays;
    }

    /**
     * @return string
     */
    public function getCapitaine()
    {
        return $this->Capitaine;
    }

    /**
     * @param string $Capitaine
     */
    public function setCapitaine($Capitaine)
    {
        $this->Capitaine = $Capitaine;
    }

    /**
     * @return string
     */
    public function getContinent()
    {
        return $this->Continent;
    }

    /**
     * @param string $Continent
     */
    public function setContinent($Continent)
    {
        $this->Continent = $Continent;
    }

    /**
     * @return string
     */
    public function getCoach()
    {
        return $this->Coach;
    }

    /**
     * @param string $Coach
     */
    public function setCoach($Coach)
    {
        $this->Coach = $Coach;
    }
}