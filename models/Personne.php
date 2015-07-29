<?php

namespace Models;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="personnes")
 * @ORM\InheritanceType("JOINED")
 **/
class Personne
{

    /**
     * Identifiant, identique au CodePersonne dans BORA.
     * 
     * @ORM\Id
     * @ORM\Column(type="integer")
     **/
    protected $id;
    
    /**
     * @ORM\Column(type="string", columnDefinition="ENUM('M', 'Mme', 'Mlle')")
     **/
    protected $civilite;
    
    /**
     * @ORM\Column(type="string")
     **/
    protected $lastName;
    
    /**
     * @ORM\Column(type="string")
     **/
    protected $firstName;
    
    /**
     * @ORM\Column(type="string", unique=false, nullable=true)
     **/
    protected $email;

    /**
     * @ORM\Column(type="date", nullable=true)
     **/
    protected $birthDay;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     **/
    protected $birthPlace;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     **/
    protected $nationality;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     **/
    protected $phoneNumber;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     **/
    protected $cellNumber;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     **/
    protected $addressCity;
    
    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     **/
    protected $addressPostalCode;
    
    public function setId($value) {
        $this->id = $value;
    }
    
    public function setCivilite($value) {
        $this->civilite = $value;
    }
    
    public function setFirstName($value) {
        $this->firstName = $value;
    }
    
    public function setLastName($value) {
        $this->lastName = $value;
    }
    
    public function setBirthDay(\DateTime $value = null) {
        $this->birthday = $value;
    }
    
    public function setBirthPlace($value) {
        $this->birthplace = $value;
    }
    
    public function setNationality($value) {
        $this->nationality = $value;
    }
    
    public function setEmail($value) {
        $this->email = $value;
    }
    
    public function setPhoneNumber($value) {
        $this->phoneNumber = $value;
    }
    
    public function setCellNumber($value) {
        $this->cellNumber = $value;
    }
    
    public function setAddressCity($value) {
        $this->addressCity = $value;
    }
    
    public function setAddressPostalCode($value) {
        $this->addressPostalCode = $value;
    }

}