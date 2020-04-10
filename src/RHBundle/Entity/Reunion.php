<?php

namespace RHBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Reunion
 *
 * @ORM\Table(name="reunion")
 * @ORM\Entity(repositoryClass="RHBundle\Repository\ReunionRepository")
 */
class Reunion
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
     * @ORM\ManyToOne(targetEntity="Employe")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $idEnseignant;

    /**
     * @ORM\ManyToOne(targetEntity="EmploiBundle\Entity\Salle")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $idSalle;

    /**
     * @ORM\ManyToOne(targetEntity="EmploiBundle\Entity\Classe")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $idclasse;

    /**
     * @var \DateTime
     * @Assert\GreaterThan("today")
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="ide", type="integer")
     */
    private $ide=0;

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
     * Set idEnseignant
     *
     * @param integer $idEnseignant
     *
     * @return Reunion
     */
    public function setIdEnseignant($idEnseignant)
    {
        $this->idEnseignant = $idEnseignant;

        return $this;
    }

    /**
     * Get idEnseignant
     *
     * @return int
     */
    public function getIdEnseignant()
    {
        return $this->idEnseignant;
    }

    /**
     * Set idSalle
     *
     * @param integer $idSalle
     *
     * @return Reunion
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
     * Set idclasse
     *
     * @param string $idclasse
     *
     * @return Reunion
     */
    public function setIdclasse($idclasse)
    {
        $this->idclasse = $idclasse;

        return $this;
    }

    /**
     * Get idclasse
     *
     * @return string
     */
    public function getIdclasse()
    {
        return $this->idclasse;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Reunion
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
     * Set ide
     *
     * @param integer $ide
     *
     * @return Reunion
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
