<?php

/**
 * @Entity
 * @Table(name="etudiants")
 **/
class Etudiant extends Personne
{
    
    /**
     * @OneToMany(targetEntity="Inscription", mappedBy="etudiant")
     * @var Inscription[]
     **/
    protected $inscriptions = null;
    
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
    public function getStagesByYear($codeAnalytique) {
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