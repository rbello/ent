<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

require_once 'Personne.php';

/**
 * @ORM\Entity
 * @ORM\Table(name="etudiants")
 **/
class Etudiant extends Personne
{
    
    /**
     * @ORM\Column(type="string", unique=true)
     **/
    protected $emailViacesi;
    
    /**
     * @ORM\OneToMany(targetEntity="Inscription", mappedBy="etudiant")
     * @var Inscription[]
     **/
    protected $inscriptions = null;
    
    public function setEmailViacesi($value) {
        $this->emailViacesi = $value;
    }
    
    /**
     * @param int year Optionnel
     * @return StageEntreprise[]
     */
    public function getStagesByYear($year = null) {
        if (!$year) $year = date('y');
        // TODO
    }
    
    /**
     * @param string codeAnalytique
     * @return StageEntreprise[]
     */
    public function getStagesByCodeAnalytique($codeAnalytique) {
        // TODO
    }
    
    /**
     * @param int year
     * @return Note[]
     */
    public function getNotes($year) {
        // TODO
    }

}