<?php

namespace Models;

/**
 * @Entity
 * @Table(name="stageentreprise")
 **/
class StageEntreprise
{

    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /**
     * @ManyToOne(targetEntity="Interlocuteur")
     * @var Interlocuteur
     **/
    protected $tuteur;
    
    /**
     * TODO
     * @var Entreprise
     **/
    protected $entreprise;

    /**
     * @ManyToOne(targetEntity="Inscription", inversedBy="stages")
     * @var Inscription
     **/
    protected $inscription;
    
    /**
     * TODO
     * @var Etudiant
     **/
    protected $etudiant;
    
    /** @Column(type="date") **/
    protected $stageBegin;
    
    /** @Column(type="date") **/
    protected $stageEnd;

}