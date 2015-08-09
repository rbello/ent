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
     **/
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     **/
    public $name;
    
    /**
     * @ORM\Column(type="string")
     **/
    public $referentiel;
    
    /**
     * @ORM\Column(type="date")
     **/
    public $date;
    
    /**
     * @ORM\OneToMany(targetEntity="UE", mappedBy="product")
     * @var UE[]
     **/
    protected $ues = null;
    
    /**
     * @ORM\OneToMany(targetEntity="Session", mappedBy="product")
     * @var Session[]
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

}