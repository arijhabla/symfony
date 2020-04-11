<?php

namespace EmploiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Affectation
 *
 * @ORM\Table(name="affectation")
 * @ORM\Entity(repositoryClass="EmploiBundle\Repository\AffectationRepository")
 */
class Affectation
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
     * @ORM\ManyToOne(targetEntity="Classe")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $nomClasse;

    /**
     * @ORM\ManyToOne(targetEntity="Salle")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $idSalle;

    /**
     * @ORM\ManyToOne(targetEntity="Matiere")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $nomMat;

    /**
     * @var \DateTime
     * @Assert\GreaterThan("today")
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="heure", type="string", length=255)
     */
    private $heure;

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
     * Set nomClasse
     *
     * @param string $nomClasse
     *
     * @return Affectation
     */
    public function setNomClasse($nomClasse)
    {
        $this->nomClasse = $nomClasse;

        return $this;
    }

    /**
     * Get nomClasse
     *
     * @return string
     */
    public function getNomClasse()
    {
        return $this->nomClasse;
    }

    /**
     * Set dSalle
     *
     * @param integer $dSalle
     *
     * @return Affectation
     */
    public function setDSalle($dSalle)
    {
        $this->dSalle = $dSalle;

        return $this;
    }

    /**
     * Get dSalle
     *
     * @return int
     */
    public function getDSalle()
    {
        return $this->dSalle;
    }

    /**
     * Set nomMat
     *
     * @param string $nomMat
     *
     * @return Affectation
     */
    public function setNomMat($nomMat)
    {
        $this->nomMat = $nomMat;

        return $this;
    }

    /**
     * Get nomMat
     *
     * @return string
     */
    public function getNomMat()
    {
        return $this->nomMat;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Affectation
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set heure
     *
     * @param string $heure
     *
     * @return Affectation
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return string
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set idSalle
     *
     * @param \EmploiBundle\Entity\Salle $idSalle
     *
     * @return Affectation
     */
    public function setIdSalle(\EmploiBundle\Entity\Salle $idSalle = null)
    {
        $this->idSalle = $idSalle;

        return $this;
    }

    /**
     * Get idSalle
     *
     * @return \EmploiBundle\Entity\Salle
     */
    public function getIdSalle()
    {
        return $this->idSalle;
    }

    /**
     * Set cln
     *
     * @param string $cln
     *
     * @return Affectation
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
