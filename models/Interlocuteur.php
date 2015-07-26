<?php

namespace Models;

require_once 'Personne.php';

/**
 * @Entity
 * @Table(name="interlocuteurs")
 **/
class Interlocuteur extends Personne
{
    
    /**
     * @OneToMany(targetEntity="StageEntreprise", mappedBy="tuteur")
     * @var StageEntreprise[]
     **/
    protected $tutorats = null;

}