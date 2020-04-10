<?php

namespace EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bulletin
 *
 * @ORM\Table(name="bulletin")
 * @ORM\Entity(repositoryClass="EleveBundle\Repository\BulletinRepository")
 */
class Bulletin
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
     * @ORM\ManyToOne(targetEntity="EleveBundle\Entity\Eleve")
     * @ORM\JoinColumn(referencedColumnName="id_eleve")
     */
    private $idEleve;

    /**
     * @ORM\ManyToOne(targetEntity="EmploiBundle\Entity\Classe")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $idClasse;

    /**
     * @ORM\ManyToOne(targetEntity="EmploiBundle\Entity\Matiere")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $idMatiere;

    /**
     * @var float
     *
     * @ORM\Column(name="moyenne", type="float")
     */
    private $moyenne;

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
     * Set idEleve
     *
     * @param integer $idEleve
     *
     * @return Bulletin
     */
    public function setIdEleve($idEleve)
    {
        $this->idEleve = $idEleve;

        return $this;
    }

    /**
     * Get idEleve
     *
     * @return int
     */
    public function getIdEleve()
    {
        return $this->idEleve;
    }

    /**
     * Set idClasse
     *
     * @param integer $idClasse
     *
     * @return Bulletin
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
     * Set idMatiere
     *
     * @param integer $idMatiere
     *
     * @return Bulletin
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
     * Set moyenne
     *
     * @param float $moyenne
     *
     * @return Bulletin
     */
    public function setMoyenne($moyenne)
    {
        $this->moyenne = $moyenne;

        return $this;
    }

    /**
     * Get moyenne
     *
     * @return float
     */
    public function getMoyenne()
    {
        return $this->moyenne;
    }

    /**
     * Set ide
     *
     * @param integer $ide
     *
     * @return Bulletin
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
