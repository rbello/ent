<?php

/**
 * @Entity
 * @Table(name="entreprises")
 **/
class Entreprise
{
    
    /**
     * Identifiant, identique au CodeEntreprise dans BORA.
     * @Id
     * @Column(type="integer")
     **/
    protected $id;
    
    /** @Column(type="string") **/
    protected $name;
    
    /** @Column(type="string") **/
    protected $region;

}