<?php

namespace Models;

/**
 * @Entity
 * @Table(name="personnes")
 * @InheritanceType("JOINED")
 **/
class Personne
{

    /**
     * Identifiant, identique au CodePersonne dans BORA.
     * @Id
     * @Column(type="integer")
     **/
    protected $id;
    
    /** @Column(type="string") **/
    protected $lastName;
    
    /** @Column(type="string") **/
    protected $firstName;
    
    /** @Column(type="string", unique=true) **/
    protected $email;
    
    /**
     * 
     */
    public function isCesiStaff() {
        
    }

}