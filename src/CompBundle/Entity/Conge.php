<?php

namespace CompBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Conge
 *
 * @ORM\Table(name="conge")
 * @ORM\Entity(repositoryClass="CompBundle\Repository\CongeRepository")
 */
class Conge
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
     * @ORM\Column(name="date_debut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     * @Assert\GreaterThan("today")
     * @ORM\Column(name="date_fin", type="date")
     */
    private $dateFin;

    /**
     * @ORM\ManyToOne(targetEntity="RHBundle\Entity\Employe")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $idEmploye;

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
     * Set dateDebut
     *
     * @param string $dateDebut
     *
     * @return Conge
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return string
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Conge
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set idEmployee
     *
     * @param \CompBundle\Entity\Employe $idEmployee
     *
     * @return Conge
     */
    public function setIdEmployee(\CompBundle\Entity\Employe $idEmployee = null)
    {
        $this->idEmployee = $idEmployee;

        return $this;
    }

    /**
     * Get idEmployee
     *
     * @return \CompBundle\Entity\Employe
     */
    public function getIdEmployee()
    {
        return $this->idEmployee;
    }

    /**
     * Set idEmploye
     *
     * @param \RHBundle\Entity\Employe $idEmploye
     *
     * @return Conge
     */
    public function setIdEmploye(\RHBundle\Entity\Employe $idEmploye = null)
    {
        $this->idEmploye = $idEmploye;

        return $this;
    }

    /**
     * Get idEmploye
     *
     * @return \RHBundle\Entity\Employe
     */
    public function getIdEmploye()
    {
        return $this->idEmploye;
    }
}
