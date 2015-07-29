<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="inscriptions")
 **/
class Inscription
{

    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    protected $id;

    /** @ORM\ManyToOne(targetEntity="Etudiant", inversedBy="inscriptions") **/
    protected $etudiant;

    /** @ORM\ManyToOne(targetEntity="Session", inversedBy="inscriptions") **/
    protected $session;

    /** @ORM\Column(type="boolean") */
    protected $confirmed;

    /**
     * @ORM\OneToMany(targetEntity="Note", mappedBy="inscription")
     * @var Note[]
     **/
    protected $notes = null;
    
    /**
     * @ORM\OneToMany(targetEntity="StageEntreprise", mappedBy="inscription")
     * @var StageEntreprise[]
     **/
    protected $stages = null;
    
    /** @ORM\Column(type="date") **/
    protected $inscriptionBegin;
    
    /** @ORM\Column(type="date") **/
    protected $inscriptionEnd;

    public function setEtudiant(Etudiant $value) {
        $this->etudiant = $value;
    }

    public function setSession(Session $value) {
        $this->session = $value;
    }
    
    public function setConfirmed($value) {
        $this->confirmed = (bool) $value;
    }
    
    public function setInscriptionBegin(\DateTime $value) {
        $this->inscriptionBegin = $value;
    }
    
    public function setInscriptionEnd(\DateTime $value) {
        $this->inscriptionEnd = $value;
    }

}