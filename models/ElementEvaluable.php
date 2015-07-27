<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="elementsevaluables")
 **/
class ElementEvaluable
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    protected $id;
    
    /** @ORM\Column(type="string") **/
    protected $name;
    
    /** @ORM\ManyToOne(targetEntity="Module", inversedBy="elementsEvaluables") **/
    protected $module;
    
}