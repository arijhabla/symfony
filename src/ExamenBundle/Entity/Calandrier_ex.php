<?php

namespace ExamenBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Calandrier_ex
 *
 * @ORM\Table(name="calandrier_ex")
 * @ORM\Entity(repositoryClass="ExamenBundle\Repository\Calandrier_exRepository")
 */
class Calandrier_ex
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Examen")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $idExamen;

    /**
     * @ORM\ManyToOne(targetEntity="EmploiBundle\Entity\Matiere")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $idMatiere;

    /**
     * @ORM\ManyToOne(targetEntity="EmploiBundle\Entity\Salle")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $idSalle;

    /**
     * @ORM\ManyToOne(targetEntity="EmploiBundle\Entity\Classe")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $idClasse;

    /**
     * @var \DateTime
     * @Assert\GreaterThan("today")
     * @ORM\Column(name="date_ex", type="date")
     */
    private $dateEx;

    /**
     * @var string
     *
     * @ORM\Column(name="cln", type="string", length=255)
     */
    private $cln='';

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
     * Set idExamen
     *
     * @param integer $idExamen
     *
     * @return Calandrier_ex
     */
    public function setIdExamen($idExamen)
    {
        $this->idExamen = $idExamen;

        return $this;
    }

    /**
     * Get idExamen
     *
     * @return int
     */
    public function getIdExamen()
    {
        return $this->idExamen;
    }

    /**
     * Set idMatiere
     *
     * @param integer $idMatiere
     *
     * @return Calandrier_ex
     */
    public function setIdMatiere($idMatiere)
    {
        $this->idMatiere = $idMatiere;

        return $this;
    }

    /**
     * Get idMatiere
     *
     * @return int
     */
    public function getIdMatiere()
    {
        return $this->idMatiere;
    }

    /**
     * Set idSalle
     *
     * @param integer $idSalle
     *
     * @return Calandrier_ex
     */
    public function setIdSalle($idSalle)
    {
        $this->idSalle = $idSalle;

        return $this;
    }

    /**
     * Get idSalle
     *
     * @return int
     */
    public function getIdSalle()
    {
        return $this->idSalle;
    }

    /**
     * Set idClasse
     *
     * @param integer $idClasse
     *
     * @return Calandrier_ex
     */
    public function setIdClasse($idClasse)
    {
        $this->idClasse = $idClasse;

        return $this;
    }

    /**
     * Get idClasse
     *
     * @return int
     */
    public function getIdClasse()
    {
        return $this->idClasse;
    }

    /**
     * Set dateEx
     *
     * @param \DateTime $dateEx
     *
     * @return Calandrier_ex
     */
    public function setDateEx($dateEx)
    {
        $this->dateEx = $dateEx;

        return $this;
    }

    /**
     * Get dateEx
     *
     * @return \DateTime
     */
    public function getDateEx()
    {
        return $this->dateEx;
    }




    /**
     * Set cln
     *
     * @param string $cln
     *
     * @return Calandrier_ex
     */
    public function setCln($cln)
    {
        $this->cln = $cln;

        return $this;
    }

    /**
     * Get cln
     *
     * @return string
     */
    public function getCln()
    {
        return $this->cln;
    }
}
