<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="stageentreprise")
 **/
class StageEntreprise
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Interlocuteur")
     * @var Interlocuteur
     **/
    protected $tuteur;
    
    /**
     * TODO
     * @var Entreprise
     **/
    protected $entreprise;

    /**
     * @ORM\ManyToOne(targetEntity="Inscription", inversedBy="stages")
     * @var Inscription
     **/
    protected $inscription;
    
    /**
     * TODO
     * @var Etudiant
     **/
    protected $etudiant;
    
    /** @ORM\Column(type="date") **/
    protected $stageBegin;
    
    /** @ORM\Column(type="date") **/
    protected $stageEnd;

}