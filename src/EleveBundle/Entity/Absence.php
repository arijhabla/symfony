<?php

namespace EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Absence
 *
 * @ORM\Table(name="absence")
 * @ORM\Entity(repositoryClass="EleveBundle\Repository\AbsenceRepository")
 */
class Absence
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
     * @var \DateTime
     * @Assert\GreaterThan("today")
     * @ORM\Column(name="date_absence", type="date")
     */
    private $dateAbsence;

    /**
     * @ORM\ManyToOne(targetEntity="EmploiBundle\Entity\Matiere")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $idMatiere;

    /**
     * @ORM\ManyToOne(targetEntity="EleveBundle\Entity\Eleve")
     * @ORM\JoinColumn(referencedColumnName="id_eleve")
     */
    private $nomEleve;

    /**
     * @var int
     *
     * @ORM\Column(name="ide", type="integer")
     */
    private $ide;

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
     * Set dateAbsence
     *
     * @param \DateTime $dateAbsence
     *
     * @return Absence
     */
    public function setDateAbsence($dateAbsence)
    {
        $this->dateAbsence = $dateAbsence;

        return $this;
    }

    /**
     * Get dateAbsence
     *
     * @return \DateTime
     */
    public function getDateAbsence()
    {
        return $this->dateAbsence;
    }

    /**
     * Set idMatiere
     *
     * @param integer $idMatiere
     *
     * @return Absence
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
     * Set nomEleve
     *
     * @param string $nomEleve
     *
     * @return Absence
     */
    public function setNomEleve($nomEleve)
    {
        $this->nomEleve = $nomEleve;

        return $this;
    }

    /**
     * Get nomEleve
     *
     * @return string
     */
    public function getNomEleve()
    {
        return $this->nomEleve;
    }

    /**
     * Set ide
     *
     * @param integer $ide
     *
     * @return Absence
     */
    public function setIde($ide)
    {
        $this->ide = $ide;

        return $this;
    }

    /**
     * Get ide
     *
     * @return integer
     */
    public function getIde()
    {
        return $this->ide;
    }
}
