<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

require_once 'ElementEvaluable.php';

/**
 * @ORM\Entity
 * @ORM\Table(name="modules")
 **/
class Module
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     **/
    protected $name;
    
    /**
     * @ORM\ManyToOne(targetEntity="UE", inversedBy="modules")
     * @var UE
     **/
    protected $ue;
    
    /**
     * @ORM\OneToMany(targetEntity="ElementEvaluable", mappedBy="module")
     * @var ElementEvaluable[]
     **/
    protected $elementsEvaluables = null;
    
    public function setName($value) {
        $this->name = $value;
    }
    
    public function setUE($value) {
        $this->ue = $value;
    }
    
}