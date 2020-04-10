<?php

namespace EmploiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matiere
 *
 * @ORM\Table(name="matiere")
 * @ORM\Entity(repositoryClass="EmploiBundle\Repository\MatiereRepository")
 */
class Matiere
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
     * @var string
     *
     * @ORM\Column(name="nom_matiere", type="string", length=255)
     */
    private $nomMatiere;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_heures", type="integer")
     */
    private $nbrHeures;


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
     * Set nomMatiere
     *
     * @param string $nomMatiere
     *
     * @return Matiere
     */
    public function setNomMatiere($nomMatiere)
    {
        $this->nomMatiere = $nomMatiere;

        return $this;
    }

    /**
     * Get nomMatiere
     *
     * @return string
     */
    public function getNomMatiere()
    {
        return $this->nomMatiere;
    }

    /**
     * Set nbrHeures
     *
     * @param integer $nbrHeures
     *
     * @return Matiere
     */
    public function setNbrHeures($nbrHeures)
    {
        $this->nbrHeures = $nbrHeures;

        return $this;
    }

    /**
     * Get nbrHeures
     *
     * @return int
     */
    public function getNbrHeures()
    {
        return $this->nbrHeures;
    }
}

