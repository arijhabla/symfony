<?php

namespace RHBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employe
 *
 * @ORM\Table(name="employe")
 * @ORM\Entity(repositoryClass="RHBundle\Repository\EmployeRepository")
 */
class Employe
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     */
    private $id=0;

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
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=255)
     */
    private $role;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_heure", type="integer")
     */
    private $nbrHeure;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_conge", type="integer")
     */
    private $nbrConge=0;

    /**
     * @var float
     *
     * @ORM\Column(name="prime", type="float")
     */
    private $prime;

    /**
     * @var float
     *
     * @ORM\Column(name="salaire", type="float")
     */
    private $salaire;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User" ,inversedBy="employe")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Employe
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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
     * @return Employe
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
     * Set role
     *
     * @param string $role
     *
     * @return Employe
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set nbrHeure
     *
     * @param integer $nbrHeure
     *
     * @return Employe
     */
    public function setNbrHeure($nbrHeure)
    {
        $this->nbrHeure = $nbrHeure;

        return $this;
    }

    /**
     * Get nbrHeure
     *
     * @return int
     */
    public function getNbrHeure()
    {
        return $this->nbrHeure;
    }

    /**
     * Set prime
     *
     * @param float $prime
     *
     * @return Employe
     */
    public function setPrime($prime)
    {
        $this->prime = $prime;

        return $this;
    }

    /**
     * Get prime
     *
     * @return float
     */
    public function getPrime()
    {
        return $this->prime;
    }

    /**
     * Set salaire
     *
     * @param float $salaire
     *
     * @return Employe
     */
    public function setSalaire($salaire)
    {
        $this->salaire = $salaire;

        return $this;
    }

    /**
     * Get salaire
     *
     * @return float
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Employe
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
     * @return Employe
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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Employe
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set nbrConge
     *
     * @param integer $nbrConge
     *
     * @return Employe
     */
    public function setNbrConge($nbrConge)
    {
        $this->nbrConge = $nbrConge;

        return $this;
    }

    /**
     * Get nbrConge
     *
     * @return integer
     */
    public function getNbrConge()
    {
        return $this->nbrConge;
    }
}
