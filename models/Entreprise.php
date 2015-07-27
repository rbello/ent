<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="entreprises")
 **/
class Entreprise
{
    
    /**
     * Identifiant, identique au CodeEntreprise dans BORA.
     * @ORM\Id
     * @ORM\Column(type="integer")
     **/
    protected $id;
    
    /** @ORM\Column(type="string") **/
    protected $name;
    
    /** @ORM\Column(type="string") **/
    protected $region;

}