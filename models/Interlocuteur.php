<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="interlocuteurs")
 **/
class Interlocuteur extends Personne
{
    
    /**
     * @ORM\OneToMany(targetEntity="StageEntreprise", mappedBy="tuteur")
     * @var StageEntreprise[]
     **/
    protected $tutorats = null;

}