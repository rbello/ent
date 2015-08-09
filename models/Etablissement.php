<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="etablissements")
 **/
class Etablissement
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    public $id;
    
    /** @ORM\Column(type="string") **/
    public $name;
    
    /** @ORM\Column(type="string", length=2, unique=true) **/
    public $racine;
    
    /**
     * @ORM\OneToMany(targetEntity="Session", mappedBy="etablissement")
     * @var Session[]
     **/
    protected $sessions = null;
    
    public function setName($value) {
        $this->name = $value;
    }
    
    public function setRacineAnalytique($value) {
        $this->racine = $value;
    }
    
}