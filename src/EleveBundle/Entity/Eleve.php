<?php

namespace EleveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Eleve
 *
 * @ORM\Table(name="eleve")
 * @ORM\Entity(repositoryClass="EleveBundle\Repository\EleveRepository")
 * @UniqueEntity(fields={"user"}, message="Cet eleve est déjà enregistrée")

 */
class Eleve
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_eleve", type="integer")
     * @ORM\Id
     */
    private $id=0;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_eleve", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom_eleve", type="string", length=255)
     */
    private $prenom;

    /**
     * @var int
     *
     * @ORM\Column(name="tel_eleve", type="integer")
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="email_eleve", type="string", length=255)
     */
    private $emailEleve;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User" ,inversedBy="eleve")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $user;


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
     * Set nom
     *
     * @param string $nom
     *
     * @return Eleve
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
     * @return Eleve
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
     * Set tel
     *
     * @param integer $tel
     *
     * @return Eleve
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return int
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set emailEleve
     *
     * @param string $emailEleve
     *
     * @return Eleve
     */
    public function setEmailEleve($emailEleve)
    {
        $this->emailEleve = $emailEleve;

        return $this;
    }

    /**
     * Get emailEleve
     *
     * @return string
     */
    public function getEmailEleve()
    {
        return $this->emailEleve;
    }

    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Eleve
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Eleve
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
}
