<?php

namespace RHBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Condidat
 *
 * @ORM\Table(name="condidat")
 * @ORM\Entity(repositoryClass="RHBundle\Repository\CondidatRepository")
 */
class Condidat
{
    /**
     * @var int
     *
     * @ORM\Column(name="cin_condidat", type="integer")
     * @ORM\Id
     */
    private $cin;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_condidat", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_condidat", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="experience_condidat", type="string", length=255)
     */
    private $experienceCondidat;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Condidat
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set experienceOndidat
     *
     * @param string $experienceOndidat
     *
     * @return Condidat
     */
    public function setExperienceOndidat($experienceOndidat)
    {
        $this->experienceOndidat = $experienceOndidat;

        return $this;
    }

    /**
     * Get experienceOndidat
     *
     * @return string
     */
    public function getExperienceOndidat()
    {
        return $this->experienceOndidat;
    }

    /**
     * Set cin
     *
     * @param integer $cin
     *
     * @return Condidat
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }

    /**
     * Get cin
     *
     * @return integer
     */
    public function getCin()
    {
        return $this->cin;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Condidat
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Condidat
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set experienceCondidat
     *
     * @param string $experienceCondidat
     *
     * @return Condidat
     */
    public function setExperienceCondidat($experienceCondidat)
    {
        $this->experienceCondidat = $experienceCondidat;

        return $this;
    }

    /**
     * Get experienceCondidat
     *
     * @return string
     */
    public function getExperienceCondidat()
    {
        return $this->experienceCondidat;
    }
}
