<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="notes")
 **/
class Note
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     **/
    protected $id;
    
    /** @ORM\ManyToOne(targetEntity="Inscription", inversedBy="notes") **/
    protected $inscription;
    
    /** @ORM\ManyToOne(targetEntity="ElementEvaluable") **/
    protected $elementEvaluable;
    
    /** @ORM\Column(type="string", columnDefinition="ENUM('A', 'B', 'C', 'Cna', 'Cac', 'D')") */
    protected $value;
    
}