<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="ues")
 **/
class UE
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    protected $id;
    
    /** @ORM\Column(type="string") **/
    protected $code;
    
    /** @ORM\Column(type="string") **/
    protected $name;
    
    /** @ORM\Column(type="string") **/
    protected $axePeda;
    
    /** @ORM\Column(type="integer") **/
    protected $ects;
    
    /**
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="ues")
     * @var Produit
     **/
    protected $product;
    
    /**
     * @ORM\OneToMany(targetEntity="Module", mappedBy="ue")
     * @var Module[]
     **/
    protected $modules = null;
    
    public function setCode($value) {
        $this->code = $value;
    }
    
    public function setName($value) {
        $this->name = $value;
    }
    
    public function setAxePeda($value) {
        $this->axePeda = $value;
    }
    
    public function setEcts($value) {
        $this->ects = $value;
    }
    
    public function setProduct(Produit $value) {
        $this->product = $value;
    }
    
}