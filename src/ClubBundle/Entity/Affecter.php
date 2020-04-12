<?php

namespace ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Affecter
 *
 * @ORM\Table(name="affecter")
 * @ORM\Entity(repositoryClass="ClubBundle\Repository\AffecterRepository")
 * @UniqueEntity(fields={"nomEvenement"}, message="Cet Evenement est déjà Réservé")
 */
class Affecter
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
     * @ORM\ManyToOne(targetEntity="Club")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $nomClub;

    /**
     * @ORM\ManyToOne(targetEntity="Evenement")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $nomEvenement;

    /**
     * @var int
     *
     * @ORM\Column(name="cli", type="integer")
     */
    private $cli;

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
     * Set nomClub
     *
     * @param string $nomClub
     *
     * @return Affecter
     */
    public function setNomClub($nomClub)
    {
        $this->nomClub = $nomClub;

        return $this;
    }

    /**
     * Get nomClub
     *
     * @return string
     */
    public function getNomClub()
    {
        return $this->nomClub;
    }

    /**
     * Set nomEvenement
     *
     * @param string $nomEvenement
     *
     * @return Affecter
     */
    public function setNomEvenement($nomEvenement)
    {
        $this->nomEvenement = $nomEvenement;

        return $this;
    }

    /**
     * Get nomEvenement
     *
     * @return string
     */
    public function getNomEvenement()
    {
        return $this->nomEvenement;
    }

    /**
     * Set cli
     *
     * @param integer $cli
     *
     * @return Affecter
     */
    public function setCli($cli)
    {
        $this->cli = $cli;

        return $this;
    }

    /**
     * Get cli
     *
     * @return integer
     */
    public function getCli()
    {
        return $this->cli;
    }
}
