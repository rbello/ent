<?php

/**
 * @Entity
 * @Table(name="inscriptions")
 **/
class Inscription
{

    /** @Id @Column(type="integer") @GeneratedValue **/
    protected $id;

    /** @ManyToOne(targetEntity="Etudiant", inversedBy="inscriptions") **/
    protected $etudiant;

    /** @ManyToOne(targetEntity="Session", inversedBy="inscriptions") **/
    protected $session;

    /** @Column(type="boolean") */
    protected $confirmed;

    /**
     * @OneToMany(targetEntity="Note", mappedBy="inscription")
     * @var Note[]
     **/
    protected $notes = null;
    
    /**
     * @OneToMany(targetEntity="StageEntreprise", mappedBy="inscription")
     * @var StageEntreprise[]
     **/
    protected $stages = null;
    
    /** @Column(type="date") **/
    protected $inscriptionBegin;
    
    /** @Column(type="date") **/
    protected $inscriptionEnd;

}