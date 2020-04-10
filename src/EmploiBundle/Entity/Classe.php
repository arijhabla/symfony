<?php

namespace EmploiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="classe")
 * @ORM\Entity(repositoryClass="EmploiBundle\Repository\ClasseRepository")
 */
class Classe
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
     * @var int
     *
     * @ORM\Column(name="nbr_eleve", type="integer")
     */
    private $nbrEleve;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", length=255)
     */
    private $niveau;


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
     * Set nbrEleve
     *
     * @param integer $nbrEleve
     *
     * @return Classe
     */
    public function setNbrEleve($nbrEleve)
    {
        $this->nbrEleve = $nbrEleve;

        return $this;
    }

    /**
     * Get nbrEleve
     *
     * @return int
     */
    public function getNbrEleve()
    {
        return $this->nbrEleve;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     *
     * @return Classe
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }
}

