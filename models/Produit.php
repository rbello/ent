<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="produits")
 **/
class Produit
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @var int
     **/
    public $id;
    
    /**
     * @ORM\Column(type="string")
     * @var string
     **/
    public $name;
    
    /**
     * @ORM\Column(type="string")
     **/
    public $referentiel;
    
    /**
     * @ORM\Column(type="date")
     * 
     **/
    public $date;
    
    /**
     * @ORM\OneToMany(targetEntity="UE", mappedBy="product")
     * @var Models\UE[]
     **/
    protected $ues = null;
    
    /**
     * @ORM\OneToMany(targetEntity="Session", mappedBy="product")
     * @var Models\Session[]
     **/
    protected $sessions = null;

    public function setId($value) {
        $this->id = $value;
    }
    
    public function setName($value) {
        $this->name = $value;
    }
    
    public function setReferentiel($value) {
        $this->referentiel = $value;
    }
    
    public function setDate(\DateTime $value) {
        $this->date = $value;
    }
    
    public function __toString() {
        return "{$this->name} ({$this->id})";
    }

}